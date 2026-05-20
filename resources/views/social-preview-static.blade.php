<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        use Illuminate\Support\Str;

        $title = $hmiProfile->organization_name . ' | ' . $program['title'];
        $description = Str::limit(strip_tags($program['summary'] ?? 'Program donasi Hosana Ministry Indonesia'), 180);
    @endphp
    <title>{{ $title }}</title>
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $imageUrl }}">
    <meta property="og:image:secure_url" content="{{ $imageUrl }}">
    <meta property="og:image:type" content="{{ $imageType }}">
    <meta property="og:image:width" content="{{ $imageWidth }}">
    <meta property="og:image:height" content="{{ $imageHeight }}">
    <meta property="og:image:alt" content="{{ $program['title'] }}">
    <meta property="og:url" content="{{ $previewUrl }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $hmiProfile->organization_name }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $imageUrl }}">
    <link rel="canonical" href="{{ $previewUrl }}">
    <link rel="image_src" href="{{ $imageUrl }}">
    <style>
        :root {
            color-scheme: light;
            --accent: #ea004f;
            --ink: #1c2430;
            --muted: #5c6675;
            --line: #e8edf2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--ink);
            background: #f6f8fb;
        }

        .page {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .preview {
            width: min(960px, 100%);
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 20px 60px rgba(28, 36, 48, 0.12);
        }

        .preview img {
            display: block;
            width: 100%;
            aspect-ratio: 1200 / 630;
            object-fit: cover;
            background: #d9e2ea;
        }

        .content {
            padding: clamp(22px, 4vw, 42px);
        }

        .site {
            margin: 0 0 10px;
            color: var(--accent);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            max-width: 780px;
            font-size: clamp(28px, 4vw, 44px);
            line-height: 1.12;
        }

        p {
            max-width: 760px;
            margin: 16px 0 0;
            color: var(--muted);
            font-size: 17px;
            line-height: 1.65;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 0 18px;
            border-radius: 6px;
            background: var(--accent);
            color: #fff;
            font-weight: 700;
            text-decoration: none;
        }

        .note {
            display: inline-flex;
            align-items: center;
            min-height: 44px;
            color: var(--muted);
            font-size: 14px;
        }
    </style>
    <script>
        const crawlerPattern = /(facebookexternalhit|facebot|facebookbot|meta-externalagent|meta-externalfetcher|twitterbot|linkedinbot|whatsapp|telegrambot|discordbot|slackbot)/i;

        if (!crawlerPattern.test(navigator.userAgent)) {
            window.location.replace(@json($programUrl));
        }
    </script>
</head>
<body>
    <main class="page">
        <article class="preview">
            <img src="{{ $imageUrl }}" alt="{{ $program['title'] }}">
            <div class="content">
                <p class="site">{{ $hmiProfile->organization_name }}</p>
                <h1>{{ $program['title'] }}</h1>
                <p>{{ $description }}</p>
                <div class="actions">
                    <a class="button" href="{{ $programUrl }}">Lihat program</a>
                    <span class="note">Mengarahkan ke halaman program...</span>
                </div>
            </div>
        </article>
    </main>
</body>
</html>
