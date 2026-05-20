<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
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
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>
    <p><a href="{{ $programUrl }}">Lihat program</a></p>
</body>
</html>
