<?php

namespace App\Services;

use App\Models\DonationProgram;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class SocialPreviewPublisher
{
    public function isConfigured(): bool
    {
        return filled($this->owner())
            && filled($this->repo())
            && filled($this->branch())
            && filled($this->token())
            && filled($this->baseUrl());
    }

    public function previewUrl(DonationProgram|string $program): string
    {
        $slug = $program instanceof DonationProgram ? $program->slug : $program;

        return rtrim($this->baseUrl(), '/') . '/' . trim($slug, '/') . '/';
    }

    /**
     * @return array{url: string, html_path: string, image_path: string}
     */
    public function publish(DonationProgram $program): array
    {
        if (! $this->isConfigured()) {
            throw new RuntimeException('GitHub preview publishing is not configured.');
        }

        $program = $program->fresh() ?? $program;
        $image = $this->resolveImage($program);
        $imagePath = 'og/' . $program->slug . '.' . $image['extension'];
        $previewUrl = $this->previewUrl($program);
        $imageUrl = rtrim($this->baseUrl(), '/') . '/' . $imagePath;

        $html = view('social-preview-static', [
            'program' => $program->toViewData(),
            'programUrl' => route('program.detail', ['program' => $program->slug]),
            'previewUrl' => $previewUrl,
            'imageUrl' => $imageUrl,
            'imageType' => $image['mime'],
            'imageWidth' => $image['width'],
            'imageHeight' => $image['height'],
        ])->render();

        $htmlPath = $program->slug . '/index.html';

        $this->putGitHubFile($htmlPath, $html, 'Publish preview page for ' . $program->slug);
        $this->putGitHubFile($imagePath, $image['contents'], 'Publish preview image for ' . $program->slug);

        return [
            'url' => $previewUrl,
            'html_path' => $htmlPath,
            'image_path' => $imagePath,
        ];
    }

    /**
     * @return array{contents: string, extension: string, mime: string, width: int, height: int}
     */
    protected function resolveImage(DonationProgram $program): array
    {
        $contents = null;
        $source = (string) $program->hero_image;
        $pathHint = $source;
        $mime = null;

        if (filled($source) && Str::startsWith($source, ['http://', 'https://'])) {
            $response = Http::timeout(30)->get($source);
            $response->throw();

            $contents = $response->body();
            $mime = $response->header('Content-Type');
        } else {
            $localPath = $this->localMediaPath($source);

            if ($localPath === null) {
                $localPath = public_path('logo.png');
                $pathHint = $localPath;
            }

            $contents = file_get_contents($localPath);
            $mime = mime_content_type($localPath) ?: null;
        }

        if ($contents === false || blank($contents)) {
            throw new RuntimeException('Unable to read preview image for ' . $program->slug . '.');
        }

        $extension = $this->imageExtension($mime, $pathHint);
        $mime = $this->imageMime($extension);
        $size = @getimagesizefromstring($contents) ?: [];

        return [
            'contents' => $contents,
            'extension' => $extension,
            'mime' => $mime,
            'width' => (int) ($size[0] ?? 1200),
            'height' => (int) ($size[1] ?? 630),
        ];
    }

    protected function localMediaPath(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        $path = rawurldecode(ltrim((string) parse_url($path, PHP_URL_PATH), '/'));

        if (is_file(public_path($path))) {
            return public_path($path);
        }

        if (Str::startsWith($path, 'storage/') && is_file(public_path($path))) {
            return public_path($path);
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->path($path);
        }

        return null;
    }

    protected function imageExtension(?string $mime, string $pathHint): string
    {
        $mime = strtolower((string) strtok((string) $mime, ';'));

        return match ($mime) {
            'image/png' => 'png',
            'image/webp' => 'webp',
            default => in_array(strtolower(pathinfo($pathHint, PATHINFO_EXTENSION)), ['png', 'webp'], true)
                ? strtolower(pathinfo($pathHint, PATHINFO_EXTENSION))
                : 'jpg',
        };
    }

    protected function imageMime(string $extension): string
    {
        return match ($extension) {
            'png' => 'image/png',
            'webp' => 'image/webp',
            default => 'image/jpeg',
        };
    }

    protected function putGitHubFile(string $path, string $contents, string $message): void
    {
        $sha = $this->existingFileSha($path);

        $payload = [
            'message' => $message,
            'content' => base64_encode($contents),
            'branch' => $this->branch(),
        ];

        if ($sha !== null) {
            $payload['sha'] = $sha;
        }

        $this->github()
            ->put($this->contentsUrl($path), $payload)
            ->throw();
    }

    protected function existingFileSha(string $path): ?string
    {
        try {
            $response = $this->github()
                ->get($this->contentsUrl($path), [
                    'ref' => $this->branch(),
                ])
                ->throw();
        } catch (RequestException $exception) {
            if ($exception->response->status() === 404) {
                return null;
            }

            throw $exception;
        }

        return $response->json('sha');
    }

    protected function github()
    {
        return Http::withToken($this->token())
            ->accept('application/vnd.github+json')
            ->withHeaders([
                'X-GitHub-Api-Version' => '2022-11-28',
            ])
            ->timeout(60);
    }

    protected function contentsUrl(string $path): string
    {
        return 'https://api.github.com/repos/'
            . rawurlencode($this->owner()) . '/'
            . rawurlencode($this->repo()) . '/contents/'
            . collect(explode('/', $path))->map(fn (string $segment): string => rawurlencode($segment))->implode('/');
    }

    protected function baseUrl(): string
    {
        return (string) config('services.github_preview.base_url');
    }

    protected function owner(): ?string
    {
        return config('services.github_preview.owner');
    }

    protected function repo(): ?string
    {
        return config('services.github_preview.repo');
    }

    protected function branch(): string
    {
        return (string) config('services.github_preview.branch', 'main');
    }

    protected function token(): ?string
    {
        return config('services.github_preview.token');
    }
}
