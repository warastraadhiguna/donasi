<?php

namespace App\Http\Middleware;

use App\Models\DonationProgram;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ServeSocialPreview
{
    public function handle(Request $request, Closure $next): Response
    {
        $crawlerUserAgents = [
            'facebookexternalhit',
            'facebot',
            'facebookbot',
            'meta-externalagent',
            'meta-externalfetcher',
            'instagram',
            'linkedinbot',
            'twitterbot',
            'whatsapp',
            'telegrambot',
            'discordbot',
            'slackbot',
        ];

        $userAgent = Str::lower((string) $request->userAgent());

        if (! Str::contains($userAgent, $crawlerUserAgents)) {
            return $next($request);
        }

        if (! $request->isMethod('GET') && ! $request->isMethod('HEAD')) {
            return $next($request);
        }

        $slug = Str::after($request->path(), 'ruang-donasi/');

        if ($slug === $request->path() || blank($slug) || str_contains($slug, '/')) {
            return $next($request);
        }

        $program = DonationProgram::query()
            ->withSum('verifiedDonationDetails', 'amount')
            ->where('slug', $slug)
            ->first();

        if ($program === null) {
            return $next($request);
        }

        return response()
            ->view('social-preview', [
                'program' => $program->toViewData(),
            ])
            ->header('Cache-Control', 'public, max-age=300')
            ->header('X-Robots-Tag', 'index, follow');
    }
}
