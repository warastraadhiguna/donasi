<!doctype html>
<html lang="id" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        use Illuminate\Support\Str;

        $encodeSocialUrl = function (string $url): string {
            $parts = parse_url($url);

            if ($parts === false || blank($parts['path'] ?? null)) {
                return $url;
            }

            $path = collect(explode('/', $parts['path']))
                ->map(fn (string $segment): string => rawurlencode(rawurldecode($segment)))
                ->implode('/');

            return ($parts['scheme'] ?? request()->getScheme()) . '://'
                . ($parts['host'] ?? request()->getHost())
                . (isset($parts['port']) ? ':' . $parts['port'] : '')
                . $path
                . (isset($parts['query']) ? '?' . $parts['query'] : '')
                . (isset($parts['fragment']) ? '#' . $parts['fragment'] : '');
        };

        $absoluteSocialUrl = function (?string $url, string $fallback = 'logo.png') use ($encodeSocialUrl): string {
            $url = filled($url) ? trim($url) : $fallback;

            if (Str::startsWith($url, ['http://', 'https://'])) {
                return $encodeSocialUrl($url);
            }

            return $encodeSocialUrl(asset(ltrim($url, '/')));
        };

        $localPublicPath = function (?string $url): ?string {
            if (blank($url)) {
                return null;
            }

            $path = parse_url($url, PHP_URL_PATH);

            if (blank($path)) {
                return null;
            }

            $publicPath = public_path(rawurldecode(ltrim($path, '/')));

            return is_file($publicPath) ? $publicPath : null;
        };

        $programUrl = route('program.detail', ['program' => $program['slug']]);
        $programShareUrl = route('program.share', ['program' => $program['slug']]);
        $programImageUrl = $absoluteSocialUrl($program['hero_image'] ?? 'logo.png');
        $programImageSecureUrl = Str::startsWith($programImageUrl, 'http://')
            ? 'https://' . Str::after($programImageUrl, 'http://')
            : $programImageUrl;
        $imagePath = $localPublicPath($programImageUrl);
        $imageSize = $imagePath ? @getimagesize($imagePath) : null;
        $imageExtension = strtolower(pathinfo(parse_url($programImageUrl, PHP_URL_PATH), PATHINFO_EXTENSION));

        $programTitle = $hmiProfile->organization_name . ' | ' . $program['title'];
        $programDescription = Str::limit(strip_tags($program['summary'] ?? 'Program donasi Hosana Ministry Indonesia'), 180);
        $ogImageWidth = (int) ($imageSize[0] ?? 1200);
        $ogImageHeight = (int) ($imageSize[1] ?? 630);

        $ogImageType = match ($imageExtension) {
            'png' => 'image/png',
            'webp' => 'image/webp',
            'gif' => 'image/gif',
            default => 'image/jpeg',
        };
    @endphp

    <title>{{ $programTitle }}</title>
    <meta name="description" content="{{ $programDescription }}">
    <meta name="author" content="{{ $hmiProfile->organization_name }}">
    <link rel="canonical" href="{{ $programShareUrl }}">
    <link rel="image_src" href="{{ $programImageUrl }}">
    <meta name="thumbnail" content="{{ $programImageUrl }}">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="{{ $hmiProfile->organization_name }}">
    <meta property="og:title" content="{{ $programTitle }}">
    <meta property="og:description" content="{{ $programDescription }}">
    <meta property="og:url" content="{{ $programShareUrl }}">
    <meta property="og:image" content="{{ $programImageUrl }}">
    <meta property="og:image:url" content="{{ $programImageUrl }}">
    <meta property="og:image:secure_url" content="{{ $programImageSecureUrl }}">
    <meta property="og:image:type" content="{{ $ogImageType }}">
    <meta property="og:image:width" content="{{ $ogImageWidth }}">
    <meta property="og:image:height" content="{{ $ogImageHeight }}">
    <meta property="og:image:alt" content="{{ $program['title'] }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $programTitle }}">
    <meta name="twitter:description" content="{{ $programDescription }}">
    <meta name="twitter:image" content="{{ $programImageUrl }}">
    <meta name="twitter:image:alt" content="{{ $program['title'] }}">
</head>
<body>
    <h1>{{ $programTitle }}</h1>
    <p>{{ $programDescription }}</p>
    <p><a href="{{ $programUrl }}">Lihat program</a></p>

    <script>
        const crawlerPattern = /(facebookexternalhit|facebot|facebookbot|meta-externalagent|meta-externalfetcher|twitterbot|linkedinbot|whatsapp|telegrambot|discordbot|slackbot)/i;

        if (!crawlerPattern.test(navigator.userAgent)) {
            window.location.replace(@json($programUrl));
        }
    </script>
</body>
</html>
