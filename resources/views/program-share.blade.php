<!doctype html>
<html lang="id" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        use Illuminate\Support\Str;

        $programUrl = route('program.detail', ['program' => $program['slug']]);
        $programShareUrl = url()->full();
        $programImageUrl = route('program.og-image', ['program' => $program['slug']]);

        $programTitle = $hmiProfile->organization_name . ' | ' . $program['title'];
        $programDescription = Str::limit(strip_tags($program['summary'] ?? 'Program donasi Hosana Ministry Indonesia'), 180);
    @endphp

    <title>{{ $programTitle }}</title>
    <meta property="og:title" content="{{ $programTitle }}">
    <meta property="og:description" content="{{ $programDescription }}">
    <meta property="og:image" content="{{ $programImageUrl }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $program['title'] }}">
    <meta property="og:url" content="{{ $programShareUrl }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="{{ $hmiProfile->organization_name }}">

    <meta name="description" content="{{ $programDescription }}">
    <meta name="author" content="{{ $hmiProfile->organization_name }}">
    <link rel="canonical" href="{{ $programShareUrl }}">
    <link rel="image_src" href="{{ $programImageUrl }}">
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
</body>
</html>
