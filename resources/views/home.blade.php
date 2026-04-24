<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HMI Peduli adalah gerakan charity untuk menghimpun donasi dan relawan bagi pendidikan, pangan, kesehatan, dan aksi kemanusiaan.">
    <meta name="author" content="{{ $hmiProfile->organization_name }}">
    <title>{{ $hmiProfile->organization_name }}</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="css/templatemo-kind-heart-charity.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #ea004f;
            --secondary-color: #54bfd0;
            --section-bg-color: #f6fcfd;
            --site-footer-bg-color: #123f4a;
            --custom-btn-bg-color: #ea004f;
            --custom-btn-bg-hover-color: #54bfd0;
            --p-color: #66717b;
            --dark-color: #0f1720;
            --border-color: #dce8ec;
        }

        html { scroll-behavior: smooth; }
        body { background: linear-gradient(180deg, #ffffff 0%, #f8fcfd 100%); }
        .site-header { background: linear-gradient(90deg, rgba(18, 63, 74, 0.96), rgba(84, 191, 208, 0.9)); }
        .site-header p, .site-header a, .site-header .social-icon-link { color: rgba(255, 255, 255, 0.92); }
        .navbar-brand .logo { width: 74px; height: auto; margin-right: 14px; }
        .navbar-brand span { color: var(--dark-color); font-weight: 700; letter-spacing: -0.8px; }
        .brand-hero {
            min-height: 92vh;
            padding: 160px 0 110px;
            position: relative;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .brand-hero::after {
            content: "";
            position: absolute;
            inset: auto 0 0 0;
            height: 120px;
            background: linear-gradient(180deg, rgba(246, 252, 253, 0), rgba(246, 252, 253, 1));
        }
        .hero-copy, .hero-card { position: relative; z-index: 2; }
        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }
        .hero-copy h1, .hero-copy p { color: #fff; }
        .hero-copy h1 {
            max-width: 720px;
            margin: 22px 0 18px;
            font-size: clamp(42px, 7vw, 74px);
            line-height: 0.98;
        }
        .hero-copy p { max-width: 620px; font-size: 18px; font-weight: 400; color: rgba(255, 255, 255, 0.84); }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 34px; }
        .hero-note { margin-top: 32px; display: flex; flex-wrap: wrap; gap: 24px; }
        .hero-note span { color: rgba(255, 255, 255, 0.84); font-size: 15px; font-weight: 500; }
        .hero-card {
            background: rgba(255, 255, 255, 0.96);
            border-radius: 28px;
            padding: 30px;
            box-shadow: 0 24px 70px rgba(0, 0, 0, 0.18);
        }
        .hero-card .stat-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid rgba(15, 23, 32, 0.08);
        }
        .hero-card .stat-line:last-child { border-bottom: 0; padding-bottom: 0; }
        .hero-card .stat-label { color: var(--p-color); font-weight: 500; }
        .hero-card .stat-value { color: var(--dark-color); font-size: 26px; font-weight: 700; }
        .brand-strip { margin-top: -44px; position: relative; z-index: 3; }
        .impact-card {
            height: 100%;
            padding: 26px;
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 18px 46px rgba(15, 23, 32, 0.08);
        }
        .impact-card h3 { margin-bottom: 10px; color: var(--primary-color); font-size: 38px; }
        .featured-block { background: #fff; border: 1px solid rgba(84, 191, 208, 0.16); }
        .featured-block:hover { transform: translateY(-6px); box-shadow: 0 18px 40px rgba(84, 191, 208, 0.18); }
        .program-pill {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(234, 0, 79, 0.08);
            color: var(--primary-color);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }
        .custom-block-wrap, .custom-text-box, .contact-info-wrap, .contact-form { box-shadow: 0 18px 50px rgba(15, 23, 32, 0.07); }
        .program-grid {
            align-items: stretch;
            --bs-gutter-y: 1.5rem;
        }
        .program-highlight-section {
            background:
                linear-gradient(135deg, rgba(18, 63, 74, 0.95), rgba(84, 191, 208, 0.9)),
                url("images/different-people-doing-volunteer-work.jpg") center center / cover no-repeat;
        }
        .program-highlight-section .program-pill {
            background: rgba(255, 255, 255, 0.16);
            color: #fff;
        }
        .program-highlight-section .program-section-header h2 {
            color: #fff;
        }
        .program-highlight-section .program-section-actions .custom-border-btn {
            border-color: rgba(255, 255, 255, 0.72);
            color: #fff;
        }
        .program-highlight-section .program-section-actions .custom-border-btn:hover {
            border-color: transparent;
        }
        .program-section-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 1.5rem;
        }
        .program-section-header .program-section-actions {
            margin-top: 4px;
        }
        .program-card-col {
            display: flex;
        }
        .program-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }
        .program-card .custom-block-image {
            height: 228px;
        }
        .program-card .custom-block {
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .program-card .custom-block-body {
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .program-card-title {
            line-height: 1.25;
            min-height: 2.5em;
            display: flex;
            align-items: flex-start;
        }
        .program-card-copy {
            min-height: 4.5em;
        }
        .program-card-meta {
            margin-top: auto;
            gap: 12px;
        }
        .program-card-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 0 18px 18px;
        }
        .program-card-actions .btn {
            flex: 1;
            border-radius: 999px;
            font-size: 15px;
            padding: 12px 14px;
            text-align: center;
        }
        .program-card-actions .custom-btn {
            display: inline-block;
        }
        .program-card-actions .share-whatsapp-btn {
            flex-basis: 100%;
            color: #128c7e;
            border-color: rgba(18, 140, 126, 0.55);
        }
        .program-card-actions .share-whatsapp-btn:hover {
            color: #fff;
            background: #128c7e;
            border-color: #128c7e;
        }
        .about-balance-row {
            align-items: flex-start;
            --bs-gutter-x: 1.75rem;
            --bs-gutter-y: 2rem;
        }
        .about-visual-card {
            padding: 18px;
            background: rgba(255, 255, 255, 0.78);
            border-radius: 30px;
            box-shadow: 0 18px 50px rgba(15, 23, 32, 0.07);
            margin-top: -18px;
        }
        .about-visual-card .custom-text-box-image {
            border-radius: 22px;
        }
        .about-side-stack {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .about-content-stack {
            display: flex;
            flex-direction: column;
            gap: 18px;
            height: 100%;
        }
        .vision-mission-box {
            position: relative;
            padding: 26px 24px;
            border-radius: 28px;
            background:
                radial-gradient(circle at top left, rgba(234, 0, 79, 0.08), transparent 38%),
                radial-gradient(circle at bottom right, rgba(84, 191, 208, 0.14), transparent 42%),
                linear-gradient(180deg, #ffffff 0%, #f7fbfc 100%);
            overflow: hidden;
        }
        .vision-mission-box::before {
            content: "";
            position: absolute;
            top: -70px;
            right: -40px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(84, 191, 208, 0.18), rgba(84, 191, 208, 0));
        }
        .vision-mission-box h5 {
            position: relative;
            margin-bottom: 18px;
            font-size: 28px;
        }
        .vision-mission-list {
            position: relative;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }
        .vision-mission-item {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
            min-height: 190px;
            padding: 22px 20px 20px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(84, 191, 208, 0.18);
            box-shadow: 0 16px 34px rgba(15, 23, 32, 0.06);
        }
        .vision-mission-item::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 5px;
            border-radius: 24px 0 0 24px;
            background: linear-gradient(180deg, var(--primary-color), #ff7ca9);
        }
        .vision-mission-icon {
            width: 50px;
            height: 50px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            border-radius: 18px;
            background: linear-gradient(135deg, rgba(234, 0, 79, 0.14), rgba(84, 191, 208, 0.18));
            color: var(--primary-color);
            font-size: 20px;
            box-shadow: inset 0 0 0 1px rgba(234, 0, 79, 0.08);
        }
        .vision-mission-item.mission-card::before {
            background: linear-gradient(180deg, var(--secondary-color), #9ae3ef);
        }
        .vision-mission-item.mission-card .vision-mission-icon {
            color: var(--secondary-color);
            background: linear-gradient(135deg, rgba(84, 191, 208, 0.18), rgba(18, 63, 74, 0.1));
        }
        .vision-mission-label {
            display: inline-flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(234, 0, 79, 0.08);
            color: var(--primary-color);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }
        .vision-mission-item.mission-card .vision-mission-label {
            background: rgba(84, 191, 208, 0.12);
            color: #257d8c;
        }
        .vision-mission-item p {
            margin-bottom: 0;
            color: var(--dark-color);
            font-size: 18px;
            line-height: 1.65;
        }
        .about-metrics-box {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
            padding: 24px 22px;
            background:
                radial-gradient(circle at top right, rgba(234, 0, 79, 0.07), transparent 35%),
                linear-gradient(180deg, #ffffff 0%, #f9fcfd 100%);
        }
        .about-metrics-box h5 {
            margin-bottom: 18px;
            font-size: 24px;
        }
        .about-metrics-box .counter-thumb {
            margin: 0;
        }
        .about-metrics-box .counter-thumb + .counter-thumb {
            margin-top: 22px;
            padding-top: 22px;
            border-top: 1px solid rgba(15, 23, 32, 0.08);
        }
        .contact-panels {
            align-items: stretch;
            justify-content: center;
            --bs-gutter-x: 2rem;
            --bs-gutter-y: 2rem;
        }
        .custom-block-wrap .progress { background: #eaf5f7; }
        .custom-block-wrap .progress-bar { background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); }
        .contact-info-wrap {
            background: linear-gradient(180deg, #ffffff 0%, #f7fbfc 100%);
            height: 100%;
            padding: 38px 34px 34px;
        }
        .contact-form {
            height: 100%;
        }
        .contact-info-wrap h2 {
            margin-bottom: 8px;
        }
        .contact-image-wrap {
            align-items: center;
            gap: 16px;
            margin-top: 18px;
            margin-bottom: 26px;
            padding-bottom: 24px;
        }
        .contact-avatar-shell {
            width: 82px;
            height: 82px;
            flex: 0 0 82px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1px solid rgba(84, 191, 208, 0.18);
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 10px 24px rgba(15, 23, 32, 0.08);
        }
        .contact-avatar-shell img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }
        .contact-info a, .site-footer a { word-break: break-word; }
        .site-footer .logo { max-width: 92px; }
        .footer-brand {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }
        .footer-brand-copy {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .footer-brand-name {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.04em;
            line-height: 1.1;
        }
        .footer-brand-tagline {
            max-width: 280px;
            margin: 0;
            color: rgba(255, 255, 255, 0.74);
            font-size: 13px;
            line-height: 1.65;
        }
        .footer-contact-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: rgba(255, 255, 255, 0.92);
        }
        .footer-contact-icon {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        .footer-contact-label {
            display: block;
            margin-bottom: 2px;
            color: rgba(255, 255, 255, 0.65);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .footer-contact-value,
        .footer-contact-value a {
            color: #fff;
            font-size: 15px;
            line-height: 1.5;
            word-break: break-word;
        }
        .footer-contact-description {
            margin-top: 18px;
            color: rgba(255, 255, 255, 0.88);
            line-height: 1.65;
        }
        .site-footer-bottom { background: rgba(0, 0, 0, 0.14); }
        .contact-form-alert {
            margin-bottom: 16px;
            padding: 14px 16px;
            border-radius: 16px;
            font-size: 14px;
        }
        .contact-form-alert.success {
            background: rgba(84, 191, 208, 0.12);
            border: 1px solid rgba(84, 191, 208, 0.2);
            color: #0f766e;
        }
        .contact-form-alert.error {
            background: rgba(234, 0, 79, 0.08);
            border: 1px solid rgba(234, 0, 79, 0.18);
            color: #be123c;
        }
        .contact-field-error {
            margin-top: 8px;
            color: #be123c;
            font-size: 13px;
        }
        [data-aos] {
            transition-timing-function: cubic-bezier(0.22, 1, 0.36, 1);
        }
        @media screen and (max-width: 991px) {
            .brand-hero { min-height: auto; padding-top: 130px; }
            .brand-strip { margin-top: 0; }
            .program-section-header {
                align-items: center;
            }
            .program-card .custom-block-image { height: 210px; }
            .program-card-copy { min-height: 0; }
            .program-card-actions {
                flex-direction: column;
            }
            .about-balance-row { --bs-gutter-x: 1.25rem; }
            .about-visual-card {
                padding: 12px;
                margin-top: 0;
            }
            .vision-mission-box {
                padding: 26px 22px 22px;
            }
            .vision-mission-box h5 {
                font-size: 28px;
            }
            .vision-mission-list {
                grid-template-columns: 1fr;
            }
            .vision-mission-item {
                min-height: 0;
                padding: 20px 18px 18px;
            }
            .vision-mission-icon {
                width: 42px;
                height: 42px;
                margin-bottom: 14px;
                border-radius: 14px;
            }
            .vision-mission-item p {
                font-size: 17px;
            }
            .contact-info-wrap { padding: 30px 24px; }
            .contact-panels { --bs-gutter-x: 1.25rem; }
        }
    </style>
</head>

<body id="top">
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 d-flex flex-wrap">
                    <p class="d-flex mb-0">
                        <i class="bi-envelope me-2"></i>
                        <a href="mailto:{{ $hmiProfile->contact_email }}">{{ $hmiProfile->contact_email }}</a>
                    </p>
                </div>
                <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                    @if (filled($hmiProfile->instagram_url) || filled($hmiProfile->facebook_url) || filled($hmiProfile->youtube_url) || filled($hmiProfile->whatsapp_link))
                        <ul class="social-icon">
                            @if (filled($hmiProfile->instagram_url))
                                <li class="social-icon-item"><a href="{{ $hmiProfile->instagram_url }}" class="social-icon-link bi-instagram" target="_blank" rel="noopener noreferrer"></a></li>
                            @endif
                            @if (filled($hmiProfile->facebook_url))
                                <li class="social-icon-item"><a href="{{ $hmiProfile->facebook_url }}" class="social-icon-link bi-facebook" target="_blank" rel="noopener noreferrer"></a></li>
                            @endif
                            @if (filled($hmiProfile->youtube_url))
                                <li class="social-icon-item"><a href="{{ $hmiProfile->youtube_url }}" class="social-icon-link bi-youtube" target="_blank" rel="noopener noreferrer"></a></li>
                            @endif
                            @if (filled($hmiProfile->whatsapp_link))
                                <li class="social-icon-item"><a href="{{ $hmiProfile->whatsapp_link }}" class="social-icon-link bi-whatsapp" target="_blank" rel="noopener noreferrer"></a></li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="logo.png" class="logo img-fluid" alt="Logo HMI Peduli">
                <span>{{ $hmiProfile->organization_name }}</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link click-scroll" href="#top">Home</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#program">Program</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#kontak">Hubungi Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="/galeri">Galeri</a></li>
                    <li class="nav-item ms-3"><a class="nav-link custom-btn custom-border-btn btn" href="/donasi">Donasi Sekarang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="brand-hero d-flex align-items-center" style="background-image: linear-gradient(120deg, rgba(15, 23, 32, 0.85), rgba(18, 63, 74, 0.6)), url('{{ $websiteContent->hero_background_image_url }}');">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-9 col-12">
                        <div class="hero-copy" data-aos="fade-up" data-aos-duration="900">
                            <span class="hero-eyebrow"><i class="bi-stars"></i>{{ $websiteContent->hero_eyebrow }}</span>
                            <h1>{{ $websiteContent->hero_title }}</h1>
                            <p>{{ $websiteContent->hero_description }}</p>
                            <div class="hero-actions">
                                <a href="/donasi" class="custom-btn btn">Kirim Donasi</a>
                                <a href="#program" class="custom-btn custom-border-btn btn">Lihat Program</a>
                            </div>
                            <div class="hero-note">
                                <span><i class="bi-check2-circle me-2"></i>{{ $websiteContent->hero_note_1 }}</span>
                                <span><i class="bi-check2-circle me-2"></i>{{ $websiteContent->hero_note_2 }}</span>
                                <span><i class="bi-check2-circle me-2"></i>{{ $websiteContent->hero_note_3 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="brand-strip pb-0">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="impact-card" data-aos="fade-up" data-aos-delay="0">
                            <h3>{{ $websiteContent->impact_1_value }}</h3>
                            <p class="mb-0">{{ $websiteContent->impact_1_text }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="impact-card" data-aos="fade-up" data-aos-delay="120">
                            <h3>{{ $websiteContent->impact_2_value }}</h3>
                            <p class="mb-0">{{ $websiteContent->impact_2_text }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="impact-card" data-aos="fade-up" data-aos-delay="240">
                            <h3>{{ $websiteContent->impact_3_value }}</h3>
                            <p class="mb-0">{{ $websiteContent->impact_3_text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="container">
                @php
                    $movementItems = collect($websiteContent->movement_items)->filter(fn ($item) => filled($item['text'] ?? null))->values();
                @endphp
                <div class="row">
                    <div class="col-lg-10 col-12 text-center mx-auto" data-aos="fade-up">
                        <h2 class="mb-5">{{ $websiteContent->movement_title }}</h2>
                    </div>
                    @foreach ($movementItems as $index => $item)
                        @php
                            $movementLink = $item['link'] ?? '/donasi';
                            $movementIsExternal = str_starts_with((string) $movementLink, 'http://') || str_starts_with((string) $movementLink, 'https://');
                            $movementAlt = trim((string) ($item['text'] ?? 'Pilihan'));
                        @endphp
                        <div class="col-lg-3 col-md-6 col-12 mb-4 {{ $loop->last ? 'mb-lg-0' : 'mb-lg-0' }}">
                            <div class="featured-block d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                <a href="{{ $movementLink }}" class="d-block" @if($movementIsExternal) target="_blank" rel="noopener noreferrer" @endif>
                                    <img src="{{ asset($item['icon'] ?? 'images/icons/heart.png') }}" class="featured-block-image img-fluid" alt="{{ $movementAlt }}">
                                    <p class="featured-block-text">{{ $item['text'] }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-padding section-bg" id="tentang">
            <div class="container">
                @php
                    $aboutPrincipleTitle = trim((string) $websiteContent->about_principle_title) === 'Prinsip Kerja'
                        ? 'Visi dan Misi'
                        : $websiteContent->about_principle_title;
                    preg_match('/\d+/', (string) $websiteContent->about_metric_1_value, $aboutMetricOneMatch);
                    preg_match('/\d+/', (string) $websiteContent->about_metric_2_value, $aboutMetricTwoMatch);
                    $aboutMetricOneNumber = (int) ($aboutMetricOneMatch[0] ?? 0);
                    $aboutMetricTwoNumber = (int) ($aboutMetricTwoMatch[0] ?? 0);
                    $aboutMetricOneSuffix = trim((string) preg_replace('/^\d+/', '', (string) $websiteContent->about_metric_1_value));
                    $aboutMetricTwoSuffix = trim((string) preg_replace('/^\d+/', '', (string) $websiteContent->about_metric_2_value));
                @endphp
                <div class="row about-balance-row">
                    <div class="col-lg-7 col-12 mb-5 mb-lg-0">
                        <div class="about-side-stack" data-aos="fade-right" data-aos-duration="850">
                            <div class="about-visual-card">
                                <img src="{{ $websiteContent->about_image_url }}"
                                    class="custom-text-box-image img-fluid" alt="Kegiatan HMI Peduli">
                            </div>

                            <div class="custom-text-box vision-mission-box mb-lg-0">
                                <h5>{{ $aboutPrincipleTitle }}</h5>
                                <div class="vision-mission-list mt-2">
                                    <div class="vision-mission-item vision-card">
                                        <span class="vision-mission-icon"><i class="bi bi-stars"></i></span>
                                        <span class="vision-mission-label">Visi</span>
                                        <p>{{ $websiteContent->about_principle_1 }}</p>
                                    </div>
                                    <div class="vision-mission-item mission-card">
                                        <span class="vision-mission-icon"><i class="bi bi-bullseye"></i></span>
                                        <span class="vision-mission-label">Misi</span>
                                        <p>{{ $websiteContent->about_principle_2 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        <div class="about-content-stack" data-aos="fade-left" data-aos-duration="850">
                            <div class="custom-text-box">
                                <span class="program-pill mb-3">{{ $websiteContent->about_badge }}</span>
                                <h2 class="mb-2">{{ $websiteContent->about_title }}</h2>
                                <p class="mb-0">{{ $websiteContent->about_description }}</p>
                            </div>

                            <div class="custom-text-box about-metrics-box mb-lg-0">
                                <h5>Ringkasan</h5>
                                <div class="counter-thumb">
                                    <div class="d-flex">
                                        <span class="counter-number" data-from="0" data-to="{{ $aboutMetricOneNumber }}" data-speed="1200" data-counter-suffix="{{ $aboutMetricOneSuffix }}">{{ $websiteContent->about_metric_1_value }}</span>
                                    </div>
                                    <span class="counter-text">{{ $websiteContent->about_metric_1_text }}</span>
                                </div>

                                <div class="counter-thumb">
                                    <div class="d-flex">
                                        <span class="counter-number" data-from="0" data-to="{{ $aboutMetricTwoNumber }}" data-speed="1200" data-counter-suffix="{{ $aboutMetricTwoSuffix }}">{{ $websiteContent->about_metric_2_value }}</span>
                                    </div>
                                    <span class="counter-text">{{ $websiteContent->about_metric_2_text }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding program-highlight-section" id="program">
            <div class="container">
                <div class="row program-grid">
                    <div class="col-lg-12 col-12">
                        <div class="program-section-header text-center" data-aos="fade-up">
                            <span class="program-pill">Program Prioritas</span>
                            <h2 class="mb-0">Ruang donasi yang paling dibutuhkan saat ini</h2>
                            <div class="program-section-actions">
                                <a href="/ruang-donasi" class="custom-btn custom-border-btn btn">Lihat Semua</a>
                            </div>
                        </div>
                    </div>

                    @forelse ($featuredPrograms as $program)
                        <div class="col-lg-4 col-md-6 col-12 {{ $loop->last ? '' : 'mb-4 mb-lg-0' }} program-card-col">
                            <div class="custom-block-wrap program-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 120 }}">
                                <img src="{{ $program->hero_image_url }}"
                                    class="custom-block-image img-fluid" alt="{{ $program->title }}">

                                <div class="custom-block">
                                    <div class="custom-block-body">
                                        <h5 class="mb-3 program-card-title">{{ $program->title }}</h5>
                                        <p class="program-card-copy">{{ $program->summary }}</p>
                                        <div class="progress mt-4">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $program->progress_percentage }}%;" aria-valuenow="{{ $program->progress_percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex align-items-center my-2 program-card-meta">
                                            <p class="mb-0"><strong>Tercapai:</strong> {{ $program->progress_label }}</p>
                                            <p class="ms-auto mb-0"><strong>Status:</strong> {{ $program->status }}</p>
                                        </div>
                                        <p class="mb-1"><strong>Terkumpul:</strong> {{ $program->formatted_received_amount }}</p>
                                        <p class="mb-1"><strong>Target:</strong> {{ $program->formatted_target_amount }}</p>
                                        <p class="mb-0"><strong>{{ $program->remaining_days_label }}</strong></p>
                                    </div>
                                    <div class="program-card-actions">
                                        <a href="{{ route('program.detail', $program) }}" class="custom-btn custom-border-btn btn">Lihat Detail</a>
                                        <a href="{{ url('/donasi?program=' . $program->slug) }}" class="custom-btn btn">Bantu Sekarang</a>
                                        <a href="https://wa.me/?text={{ rawurlencode('Yuk bantu program ' . $program->title . ': ' . route('program.detail', $program)) }}" class="custom-btn custom-border-btn btn share-whatsapp-btn" target="_blank" rel="noopener noreferrer">
                                            <i class="bi-whatsapp me-1"></i>Share ke WhatsApp
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 col-12">
                            <div class="custom-block-wrap p-4 text-center">
                                <p class="mb-0">Belum ada ruang donasi yang ditampilkan.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="contact-section section-padding" id="kontak">
            <div class="container">
                <div class="row contact-panels">
                    <div class="col-lg-5 col-12" data-aos="fade-up" data-aos-duration="800">
                        <div class="contact-info-wrap">
                            <h2>Hubungi tim kami</h2>

                            <div class="contact-image-wrap d-flex flex-wrap">
                                <div class="contact-avatar-shell">
                                    <img src="logo.png" class="img-fluid" alt="Logo HMI Peduli">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <p class="mb-0">{{ $hmiProfile->contact_team_name }}</p>
                                    <p class="mb-0"><strong>{{ $hmiProfile->contact_team_role }}</strong></p>
                                </div>
                            </div>

                            <div class="contact-info">
                                <h5 class="mb-3">Informasi Kontak</h5>
                                <p class="d-flex mb-2"><i class="bi-geo-alt me-2"></i>{{ $hmiProfile->contact_address }}</p>
                                <p class="d-flex mb-2"><i class="bi-envelope me-2"></i><a href="mailto:{{ $hmiProfile->contact_email }}">{{ $hmiProfile->contact_email }}</a></p>
                                @if (filled($hmiProfile->whatsapp_link))
                                    <p class="d-flex mb-2"><i class="bi-whatsapp me-2"></i><a href="{{ $hmiProfile->whatsapp_link }}" target="_blank" rel="noopener noreferrer">{{ $hmiProfile->whatsapp_display }}</a></p>
                                @endif
                                <p class="d-flex"><i class="bi-globe2 me-2"></i>{{ $hmiProfile->contact_support_text }}</p>
                                <a href="/donasi" class="custom-btn btn mt-3">Buka Halaman Donasi</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12" data-aos="fade-up" data-aos-delay="120" data-aos-duration="800">
                        <form class="custom-form contact-form" action="{{ route('contact.submit') }}" method="post" role="form">
                            @csrf
                            <h2>{{ $websiteContent->contact_form_title }}</h2>
                            <p class="mb-4">
                                @if (filled($hmiProfile->whatsapp_link))
                                    Untuk kerja sama atau pertanyaan umum, kamu juga bisa hubungi <a href="{{ $hmiProfile->whatsapp_link }}" target="_blank" rel="noopener noreferrer">{{ $hmiProfile->whatsapp_url }}</a>.
                                @else
                                    Untuk kerja sama atau pertanyaan umum, kirim pesan lewat form berikut.
                                @endif
                            </p>

                            @if (session('contact_submitted'))
                                <div class="contact-form-alert success">{{ session('contact_submitted') }}</div>
                            @endif

                            @if ($errors->has('first_name') || $errors->has('last_name') || $errors->has('whatsapp') || $errors->has('message'))
                                <div class="contact-form-alert error">Mohon lengkapi data pesan dengan benar sebelum dikirim.</div>
                            @endif

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="text" name="first_name" id="first-name" class="form-control" placeholder="Nama depan" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <div class="contact-field-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="text" name="last_name" id="last-name" class="form-control" placeholder="Nama belakang" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <div class="contact-field-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <input type="tel" name="whatsapp" id="whatsapp" class="form-control" placeholder="No WhatsApp aktif" value="{{ old('whatsapp') }}" required>
                            @error('whatsapp')
                                <div class="contact-field-error">{{ $message }}</div>
                            @enderror
                            <textarea name="message" rows="5" class="form-control" id="message" placeholder="Tulis kebutuhan atau pesan kamu">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="contact-field-error">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="form-control">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4">
                    <div class="footer-brand">
                        <img src="logo.png" class="logo img-fluid" alt="Logo {{ $hmiProfile->organization_name }}">
                        <div class="footer-brand-copy">
                            <div class="footer-brand-name">{{ $hmiProfile->organization_name }}</div>
                            @if (filled($hmiProfile->header_tagline))
                                <p class="footer-brand-tagline">{{ $hmiProfile->header_tagline }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <h5 class="site-footer-title mb-3">Navigasi Cepat</h5>
                    <ul class="footer-menu">
                        <li class="footer-menu-item"><a href="#tentang" class="footer-menu-link">Tentang Kami</a></li>
                        <li class="footer-menu-item"><a href="#program" class="footer-menu-link">Program Prioritas</a></li>
                        <li class="footer-menu-item"><a href="#kontak" class="footer-menu-link">Hubungi Kami</a></li>
                        <li class="footer-menu-item"><a href="/galeri" class="footer-menu-link">Galeri</a></li>
                        <li class="footer-menu-item"><a href="/donasi" class="footer-menu-link">Donasi</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mx-auto">
                    <h5 class="site-footer-title mb-3">Kontak</h5>
                    <div class="footer-contact-list">
                        <div class="footer-contact-item">
                            <div class="footer-contact-icon"><i class="bi-envelope"></i></div>
                            <div class="footer-contact-copy">
                                <span class="footer-contact-label">Email</span>
                                <div class="footer-contact-value">
                                    <a href="mailto:{{ $hmiProfile->contact_email }}" class="site-footer-link">{{ $hmiProfile->contact_email }}</a>
                                </div>
                            </div>
                        </div>
                        @if (filled($hmiProfile->whatsapp_link))
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon"><i class="bi-whatsapp"></i></div>
                                <div class="footer-contact-copy">
                                    <span class="footer-contact-label">WhatsApp</span>
                                    <div class="footer-contact-value">
                                        <a href="{{ $hmiProfile->whatsapp_link }}" class="site-footer-link" target="_blank" rel="noopener noreferrer">{{ $hmiProfile->whatsapp_display }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <p class="footer-contact-description">{{ $hmiProfile->footer_description }}</p>
                    <a href="/donasi" class="custom-btn btn mt-3">Donasi Sekarang</a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-12">
                        <p class="copyright-text mb-0">Copyright &copy; 2026 <a href="/">HMI Peduli</a>. Semua hak cipta dilindungi.</p>
                    </div>
                    <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                        @if (filled($hmiProfile->instagram_url) || filled($hmiProfile->facebook_url) || filled($hmiProfile->youtube_url) || filled($hmiProfile->whatsapp_link))
                            <ul class="social-icon">
                                @if (filled($hmiProfile->instagram_url))
                                    <li class="social-icon-item"><a href="{{ $hmiProfile->instagram_url }}" class="social-icon-link bi-instagram" target="_blank" rel="noopener noreferrer"></a></li>
                                @endif
                                @if (filled($hmiProfile->facebook_url))
                                    <li class="social-icon-item"><a href="{{ $hmiProfile->facebook_url }}" class="social-icon-link bi-facebook" target="_blank" rel="noopener noreferrer"></a></li>
                                @endif
                                @if (filled($hmiProfile->youtube_url))
                                    <li class="social-icon-item"><a href="{{ $hmiProfile->youtube_url }}" class="social-icon-link bi-youtube" target="_blank" rel="noopener noreferrer"></a></li>
                                @endif
                                @if (filled($hmiProfile->whatsapp_link))
                                    <li class="social-icon-item"><a href="{{ $hmiProfile->whatsapp_link }}" class="social-icon-link bi-whatsapp" target="_blank" rel="noopener noreferrer"></a></li>
                                @endif
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/counter.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="js/custom.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.AOS) {
                AOS.init({
                    once: true,
                    duration: 800,
                    easing: 'ease-out-cubic',
                    offset: 80,
                    mirror: false,
                });
            }
        });
    </script>
</body>

</html>
