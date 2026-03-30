<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Halaman donasi HMI Peduli untuk mendukung program pendidikan, pangan, kesehatan, dan aksi kemanusiaan.">
    <meta name="author" content="{{ $hmiProfile->organization_name }}">

    <title>{{ $hmiProfile->organization_name }} | Halaman Donasi</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-icons.css" rel="stylesheet">
    <link href="/css/templatemo-kind-heart-charity.css" rel="stylesheet">

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

        .site-header {
            background: linear-gradient(90deg, rgba(18, 63, 74, 0.96), rgba(84, 191, 208, 0.9));
        }

        .site-header p,
        .site-header a,
        .site-header .social-icon-link {
            color: rgba(255, 255, 255, 0.92);
        }

        .navbar-brand .logo {
            width: 74px;
            margin-right: 14px;
        }

        .navbar-brand span {
            color: var(--dark-color);
            font-weight: 700;
            letter-spacing: -0.8px;
        }

        .donate-section {
            background:
                linear-gradient(135deg, rgba(15, 23, 32, 0.82), rgba(18, 63, 74, 0.74)),
                url("/images/slide/medium-shot-people-collecting-donations.jpg") center center / cover no-repeat;
        }

        .site-footer .logo {
            max-width: 92px;
        }

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

        .custom-select-wrap {
            position: relative;
        }

        .custom-select-wrap::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 18px;
            width: 12px;
            height: 12px;
            pointer-events: none;
            transform: translateY(-50%);
            background: no-repeat center / contain;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none'%3E%3Cpath d='M3.5 6L8 10.5L12.5 6' stroke='%2366717b' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        }

        .custom-select-wrap .form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 48px;
            cursor: pointer;
        }

        .donation-form-shell {
            width: 100%;
            max-width: 1040px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 24px 70px rgba(15, 23, 32, 0.18);
        }

        .donation-grid {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 1.5rem;
        }

        .donation-grid > div {
            display: flex;
        }

        .donation-section-card {
            width: 100%;
            padding: 24px;
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(246, 252, 253, 0.98), rgba(255, 255, 255, 0.98));
            box-shadow: inset 0 0 0 1px rgba(220, 232, 236, 0.85);
        }

        .donation-section-card h5 {
            margin-bottom: 18px;
        }

        .donate-form .form-control,
        .donate-form .proof-upload-box,
        .donate-form .payment-detail-card {
            background: #fff;
        }

        .donate-form .form-control {
            border: 1px solid rgba(220, 232, 236, 0.95);
        }

        .donate-form .form-control:focus,
        .donate-form .form-control:hover {
            border-color: rgba(84, 191, 208, 0.55);
            background: #fff;
        }

        .donate-form .input-group .form-control {
            border-left: 0;
        }

        .donate-form .input-group-text {
            background: var(--secondary-color);
            color: #fff;
            border: 1px solid var(--secondary-color);
            border-right: 0;
        }

        .program-preview-card {
            margin-top: 18px;
            padding: 20px;
            border-radius: 22px;
            background: #fff;
            box-shadow: inset 0 0 0 1px rgba(220, 232, 236, 0.92), 0 14px 30px rgba(15, 23, 32, 0.05);
        }

        .program-preview-card.is-empty {
            display: grid;
            place-items: center;
            min-height: 240px;
            text-align: center;
            color: var(--p-color);
        }

        .program-preview-card.is-empty .program-preview-content {
            display: none;
        }

        .program-preview-card:not(.is-empty) .program-preview-placeholder {
            display: none;
        }

        .program-preview-title {
            margin-bottom: 10px;
            color: var(--primary-color);
            font-size: 28px;
            line-height: 1.15;
        }

        .program-preview-summary {
            margin-bottom: 18px;
            color: var(--p-color);
            font-size: 15px;
            line-height: 1.65;
        }

        .program-preview-progress {
            margin-bottom: 18px;
        }

        .program-preview-progress-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: var(--dark-color);
        }

        .program-preview-progress-bar {
            height: 8px;
            border-radius: 999px;
            background: rgba(220, 232, 236, 0.9);
            overflow: hidden;
        }

        .program-preview-progress-fill {
            width: 0;
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, rgba(234, 0, 79, 0.9), rgba(84, 191, 208, 0.9));
            transition: width 0.2s ease;
        }

        .program-preview-stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px 18px;
        }

        .program-preview-stat {
            min-width: 0;
        }

        .program-preview-stat-label {
            display: block;
            margin-bottom: 2px;
            color: var(--p-color);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .program-preview-stat-value {
            color: var(--dark-color);
            font-size: 16px;
            font-weight: 700;
            line-height: 1.4;
            word-break: break-word;
        }

        .program-preview-placeholder i {
            display: block;
            margin-bottom: 12px;
            color: var(--secondary-color);
            font-size: 36px;
        }

        .program-preview-placeholder strong {
            display: block;
            margin-bottom: 6px;
            color: var(--dark-color);
        }

        .amount-choice-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .amount-choice-btn {
            position: relative;
            display: flex;
            align-items: center;
            gap: 14px;
            width: 100%;
            min-width: 0;
            padding: 18px;
            border: 1px solid rgba(220, 232, 236, 0.92);
            border-radius: 18px;
            background: #fff;
            color: var(--dark-color);
            text-align: left;
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease, background 0.18s ease;
            box-shadow: 0 10px 22px rgba(15, 23, 32, 0.06);
        }

        .amount-choice-btn:hover,
        .amount-choice-btn:focus-visible {
            transform: translateY(-1px);
            border-color: rgba(84, 191, 208, 0.7);
            box-shadow: 0 16px 30px rgba(84, 191, 208, 0.14);
            outline: none;
        }

        .amount-choice-btn.is-active {
            border-color: rgba(234, 0, 79, 0.18);
            background: linear-gradient(135deg, rgba(234, 0, 79, 0.08), rgba(84, 191, 208, 0.12));
            box-shadow: 0 16px 28px rgba(18, 63, 74, 0.12);
        }

        .amount-choice-mark {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: rgba(84, 191, 208, 0.14);
            color: var(--secondary-color);
            font-size: 18px;
        }

        .amount-choice-copy {
            flex: 1;
            min-width: 0;
        }

        .amount-choice-value {
            display: block;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.03em;
            line-height: 1.15;
        }

        .amount-choice-check {
            flex-shrink: 0;
            width: 26px;
            height: 26px;
            display: grid;
            place-items: center;
            border-radius: 999px;
            border: 1px solid rgba(220, 232, 236, 0.92);
            color: transparent;
            background: #fff;
            transition: border-color 0.18s ease, background 0.18s ease, color 0.18s ease;
        }

        .amount-choice-btn.is-active .amount-choice-mark {
            background: rgba(234, 0, 79, 0.12);
            color: var(--primary-color);
        }

        .amount-choice-btn.is-active .amount-choice-check {
            border-color: var(--primary-color);
            background: var(--primary-color);
            color: #fff;
        }

        .amount-input-shell {
            padding: 14px;
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(246, 252, 253, 0.98), rgba(255, 255, 255, 1));
            box-shadow: inset 0 0 0 1px rgba(220, 232, 236, 0.92);
        }

        .amount-input-label {
            margin-bottom: 12px;
            font-size: 14px;
            font-weight: 600;
            color: var(--p-color);
        }

        .amount-input-shell .input-group {
            overflow: hidden;
            border-radius: 18px;
            box-shadow: 0 14px 28px rgba(15, 23, 32, 0.07);
        }

        .amount-input-shell .input-group-text {
            min-width: 64px;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
        }

        .amount-input-shell .form-control {
            min-height: 74px;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.04em;
            padding-inline: 20px;
        }

        .amount-input-shell .form-control::placeholder {
            color: #aab4bc;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: normal;
        }

        .amount-helper-text {
            margin-top: 12px;
            margin-bottom: 0;
            color: var(--p-color);
            font-size: 13px;
        }

        .payment-detail-card {
            display: none;
            margin-top: 18px;
            padding: 20px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: inset 0 0 0 1px rgba(220, 232, 236, 0.85);
        }

        .payment-detail-card.is-active {
            display: block;
        }

        .payment-detail-card p:last-child {
            margin-bottom: 0;
        }

        .payment-detail-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 4px;
        }

        .qris-dummy {
            width: min(100%, 240px);
            aspect-ratio: 1;
            margin: 0 auto 16px;
            border-radius: 20px;
            padding: 18px;
            background:
                linear-gradient(90deg, rgba(15, 23, 32, 0.95) 10px, transparent 10px) 0 0 / 24px 24px,
                linear-gradient(rgba(15, 23, 32, 0.95) 10px, transparent 10px) 0 0 / 24px 24px,
                linear-gradient(90deg, transparent 14px, rgba(15, 23, 32, 0.95) 14px) 0 0 / 24px 24px,
                linear-gradient(transparent 14px, rgba(15, 23, 32, 0.95) 14px) 0 0 / 24px 24px,
                #fff;
            border: 8px solid #fff;
            box-shadow: inset 0 0 0 1px rgba(15, 23, 32, 0.08), 0 14px 30px rgba(15, 23, 32, 0.12);
            position: relative;
            overflow: hidden;
        }

        .qris-dummy::before,
        .qris-dummy::after {
            content: "";
            position: absolute;
            width: 56px;
            height: 56px;
            border: 10px solid var(--primary-color);
            background: #fff;
        }

        .qris-dummy::before {
            top: 18px;
            left: 18px;
        }

        .qris-dummy::after {
            right: 18px;
            bottom: 18px;
            border-color: var(--secondary-color);
        }

        .qris-dummy-badge {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.94);
            color: var(--dark-color);
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            box-shadow: 0 10px 24px rgba(15, 23, 32, 0.12);
        }

        .proof-upload-box {
            position: relative;
            display: grid;
            place-items: center;
            min-height: 188px;
            border: 2px dashed rgba(84, 191, 208, 0.45);
            border-radius: 20px;
            background: linear-gradient(180deg, rgba(246, 252, 253, 0.96), rgba(255, 255, 255, 0.98));
            text-align: center;
            padding: 22px;
            overflow: hidden;
            margin-top: 18px;
        }

        .proof-upload-box input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .proof-upload-icon {
            width: 58px;
            height: 58px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: rgba(84, 191, 208, 0.16);
            color: var(--secondary-color);
            font-size: 24px;
            margin: 0 auto 14px;
        }

        .proof-upload-box strong {
            display: block;
            color: var(--dark-color);
            margin-bottom: 6px;
        }

        .proof-upload-box.has-file {
            border-color: rgba(84, 191, 208, 0.8);
            background: linear-gradient(180deg, rgba(84, 191, 208, 0.08), rgba(255, 255, 255, 0.98));
        }

        .proof-upload-note {
            font-size: 13px;
            margin-top: 14px;
            margin-bottom: 0;
        }

        .donation-alert {
            margin-bottom: 22px;
            padding: 16px 18px;
            border-radius: 18px;
            font-size: 15px;
        }

        .donation-alert-success {
            background: rgba(84, 191, 208, 0.12);
            color: #12616d;
            border: 1px solid rgba(84, 191, 208, 0.24);
        }

        .donation-alert-error {
            background: rgba(234, 0, 79, 0.08);
            color: #b0003c;
            border: 1px solid rgba(234, 0, 79, 0.18);
        }

        .field-error {
            margin-top: 8px;
            color: #b0003c;
            font-size: 13px;
        }

        @media screen and (max-width: 991px) {
            .donation-form-shell {
                padding: 28px 20px;
            }
        }

        @media screen and (max-width: 575px) {
            .program-preview-card {
                padding: 18px;
            }

            .program-preview-title {
                font-size: 24px;
            }

            .program-preview-stats {
                grid-template-columns: minmax(0, 1fr);
            }

            .amount-choice-btn {
                padding: 14px;
            }

            .amount-choice-value {
                font-size: 20px;
            }

            .amount-choice-mark {
                width: 40px;
                height: 40px;
            }

            .amount-input-shell .input-group-text {
                min-width: 58px;
                font-size: 22px;
            }

            .amount-input-shell .form-control {
                min-height: 68px;
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
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
                    <ul class="social-icon">
                        <li class="social-icon-item"><a href="{{ $hmiProfile->facebook_url ?: '#' }}" class="social-icon-link bi-facebook" @if(filled($hmiProfile->facebook_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                        <li class="social-icon-item"><a href="{{ $hmiProfile->instagram_url ?: '#' }}" class="social-icon-link bi-instagram" @if(filled($hmiProfile->instagram_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                        <li class="social-icon-item"><a href="{{ $hmiProfile->youtube_url ?: '#' }}" class="social-icon-link bi-youtube" @if(filled($hmiProfile->youtube_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                        <li class="social-icon-item"><a href="{{ $hmiProfile->whatsapp_link ?: '#' }}" class="social-icon-link bi-whatsapp" @if(filled($hmiProfile->whatsapp_link)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/logo.png" class="logo img-fluid" alt="Logo HMI Peduli">
                <span>{{ $hmiProfile->organization_name }}</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#program">Program</a></li>
                    <li class="nav-item"><a class="nav-link" href="/galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#kontak">Hubungi Kami</a></li>
                    <li class="nav-item ms-3"><a class="nav-link custom-btn custom-border-btn btn" href="/donasi">Donasi Sekarang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="donate-section">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11 col-12">
                        @php
                            $programPreviewData = $programs->mapWithKeys(function ($program) {
                                return [
                                    $program->slug => [
                                        'title' => $program->title,
                                        'summary' => $program->summary,
                                        'progress_label' => $program->progress_label,
                                        'progress_percentage' => $program->progress_percentage,
                                        'status' => $program->status,
                                        'received_amount' => $program->formatted_received_amount,
                                        'target_amount' => $program->formatted_target_amount,
                                        'remaining_days_label' => $program->remaining_days_label,
                                    ],
                                ];
                            })->all();
                        @endphp
                        <div class="donation-form-shell">
                        @if (session('donation_submitted'))
                            <div class="donation-alert donation-alert-success">
                                {{ session('donation_submitted') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="donation-alert donation-alert-error">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form class="custom-form donate-form" action="{{ route('donate.page') }}" method="post" enctype="multipart/form-data" role="form">
                            @csrf
                            <h3 class="mb-4">Form Donasi HMI Peduli</h3>

                            <div class="row donation-grid">
                                <div class="col-lg-6 col-12">
                                    <div class="donation-section-card">
                                        <h5>Pilih Ruang Donasi</h5>
                                        <div class="custom-select-wrap">
                                            <select name="program" id="donation-program" class="form-control" required>
                                                <option value="" disabled {{ $selectedProgram ? '' : 'selected' }}>Pilih ruang donasi</option>
                                                @foreach ($programs as $program)
                                                    <option value="{{ $program->slug }}" {{ old('program', $selectedProgram) === $program->slug ? 'selected' : '' }}>
                                                        {{ $program->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('program')
                                            <div class="field-error">{{ $message }}</div>
                                        @enderror

                                        <div id="program-preview" class="program-preview-card is-empty">
                                            <div class="program-preview-content">
                                                <h4 class="program-preview-title js-program-title"></h4>
                                                <p class="program-preview-summary js-program-summary"></p>

                                                <div class="program-preview-progress">
                                                    <div class="program-preview-progress-top">
                                                        <span class="js-program-progress-label"></span>
                                                        <span class="js-program-status"></span>
                                                    </div>
                                                    <div class="program-preview-progress-bar">
                                                        <div class="program-preview-progress-fill js-program-progress-fill"></div>
                                                    </div>
                                                </div>

                                                <div class="program-preview-stats">
                                                    <div class="program-preview-stat">
                                                        <span class="program-preview-stat-label">Terkumpul</span>
                                                        <span class="program-preview-stat-value js-program-received"></span>
                                                    </div>
                                                    <div class="program-preview-stat">
                                                        <span class="program-preview-stat-label">Target</span>
                                                        <span class="program-preview-stat-value js-program-target"></span>
                                                    </div>
                                                    <div class="program-preview-stat">
                                                        <span class="program-preview-stat-label">Status</span>
                                                        <span class="program-preview-stat-value js-program-status-detail"></span>
                                                    </div>
                                                    <div class="program-preview-stat">
                                                        <span class="program-preview-stat-label">Sisa Hari</span>
                                                        <span class="program-preview-stat-value js-program-days"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="program-preview-placeholder">
                                                <i class="bi bi-card-text"></i>
                                                <strong>Pilih ruang donasi</strong>
                                                <span>Ringkasan program akan muncul di sini.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="donation-section-card">
                                        <h5>Nominal Donasi</h5>
                                        <div class="amount-choice-grid" role="group" aria-label="Pilih nominal donasi cepat">
                                            <button type="button" class="amount-choice-btn js-amount-preset" data-amount-value="5000">
                                                <span class="amount-choice-mark" aria-hidden="true"><i class="bi bi-heart-fill"></i></span>
                                                <span class="amount-choice-copy">
                                                    <span class="amount-choice-value">Rp5.000</span>
                                                </span>
                                                <span class="amount-choice-check" aria-hidden="true"><i class="bi bi-check-lg"></i></span>
                                            </button>
                                            <button type="button" class="amount-choice-btn js-amount-preset" data-amount-value="10000">
                                                <span class="amount-choice-mark" aria-hidden="true"><i class="bi bi-heart-fill"></i></span>
                                                <span class="amount-choice-copy">
                                                    <span class="amount-choice-value">Rp10.000</span>
                                                </span>
                                                <span class="amount-choice-check" aria-hidden="true"><i class="bi bi-check-lg"></i></span>
                                            </button>
                                            <button type="button" class="amount-choice-btn js-amount-preset" data-amount-value="25000">
                                                <span class="amount-choice-mark" aria-hidden="true"><i class="bi bi-heart-fill"></i></span>
                                                <span class="amount-choice-copy">
                                                    <span class="amount-choice-value">Rp25.000</span>
                                                </span>
                                                <span class="amount-choice-check" aria-hidden="true"><i class="bi bi-check-lg"></i></span>
                                            </button>
                                            <button type="button" class="amount-choice-btn js-amount-preset" data-amount-value="50000">
                                                <span class="amount-choice-mark" aria-hidden="true"><i class="bi bi-heart-fill"></i></span>
                                                <span class="amount-choice-copy">
                                                    <span class="amount-choice-value">Rp50.000</span>
                                                </span>
                                                <span class="amount-choice-check" aria-hidden="true"><i class="bi bi-check-lg"></i></span>
                                            </button>
                                            <button type="button" class="amount-choice-btn js-amount-preset" data-amount-value="100000">
                                                <span class="amount-choice-mark" aria-hidden="true"><i class="bi bi-heart-fill"></i></span>
                                                <span class="amount-choice-copy">
                                                    <span class="amount-choice-value">Rp100.000</span>
                                                </span>
                                                <span class="amount-choice-check" aria-hidden="true"><i class="bi bi-check-lg"></i></span>
                                            </button>
                                        </div>

                                        <div class="amount-input-shell">
                                            <p class="amount-input-label">Atau isi nominal sendiri</p>
                                            <div class="input-group mb-0">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                                <input type="text" class="form-control" name="amount" id="donation-amount" value="{{ old('amount') }}" placeholder="Tuliskan jumlah nominal"
                                                    inputmode="numeric" autocomplete="off" aria-label="Nominal donasi" aria-describedby="basic-addon1">
                                            </div>
                                            <p class="amount-helper-text">Klik nominal cepat di atas atau tuliskan jumlah donasi sesuai kebutuhan.</p>
                                        </div>
                                        @error('amount')
                                            <div class="field-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="donation-section-card">
                                        <h5>Data Donatur</h5>
                                        <div class="row g-3">
                                            <div class="col-lg-12 col-12">
                                                <input type="text" name="donation_name" id="donation-name" class="form-control"
                                                    placeholder="Nama lengkap" value="{{ old('donation_name') }}" required>
                                                @error('donation_name')
                                                    <div class="field-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <input type="tel" name="donation_whatsapp" id="donation-whatsapp"
                                                    class="form-control" placeholder="No WhatsApp aktif" value="{{ old('donation_whatsapp') }}" required>
                                                @error('donation_whatsapp')
                                                    <div class="field-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="donation-section-card">
                                        <h5>Metode Pembayaran</h5>

                                        <div class="form-check">
                                            <input class="form-check-input js-payment-option" type="radio" name="payment_method"
                                                id="payment-transfer" value="Transfer" {{ old('payment_method', filled($hmiProfile->qris_image_url) ? null : 'Transfer') === 'Transfer' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="payment-transfer">
                                                <i class="bi-bank custom-icon ms-1"></i>
                                                Transfer
                                            </label>
                                        </div>

                                        @if (filled($hmiProfile->qris_image_url))
                                            <div class="form-check">
                                                <input class="form-check-input js-payment-option" type="radio" name="payment_method"
                                                    id="payment-qris" value="QRIS" {{ old('payment_method') === 'QRIS' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="payment-qris">
                                                    <i class="bi-qr-code custom-icon ms-1"></i>
                                                    QRIS
                                                </label>
                                            </div>
                                        @endif

                                        <div id="payment-transfer-detail" class="payment-detail-card" data-payment-detail="Transfer">
                                            <span class="payment-detail-label">Rekening Transfer</span>
                                            <p class="mb-2"><strong>Nama Bank:</strong> {{ $hmiProfile->transfer_bank_name }}</p>
                                            <p class="mb-2"><strong>No. Rekening:</strong> {{ $hmiProfile->transfer_account_number }}</p>
                                            <p class="mb-0"><strong>Nama Pemilik:</strong> {{ $hmiProfile->transfer_account_holder }}</p>
                                        </div>

                                        @if (filled($hmiProfile->qris_image_url))
                                            <div id="payment-qris-detail" class="payment-detail-card text-center" data-payment-detail="QRIS">
                                                <img src="{{ $hmiProfile->qris_image_url }}" class="img-fluid rounded-4 mb-3" alt="QRIS {{ $hmiProfile->organization_name }}">
                                                <span class="payment-detail-label">QR Bayar</span>
                                                <p class="mb-0">Scan QRIS ini untuk pembayaran.</p>
                                            </div>
                                        @endif

                                        <label class="proof-upload-box" for="payment-proof">
                                            <input type="file" id="payment-proof" name="payment_proof" accept=".jpg,.jpeg,.png,.webp,.pdf" required>
                                            <div>
                                                <div class="proof-upload-icon">
                                                    <i class="bi-cloud-arrow-up"></i>
                                                </div>
                                                <strong>Kirim Bukti Bayar</strong>
                                                <span class="js-proof-text">Pilih file gambar atau PDF sebagai bukti pembayaran.</span>
                                            </div>
                                        </label>

                                        @error('payment_method')
                                            <div class="field-error">{{ $message }}</div>
                                        @enderror
                                        @error('payment_proof')
                                            <div class="field-error">{{ $message }}</div>
                                        @enderror

                                        <p class="proof-upload-note">Bukti bayar ini akan masuk ke admin dan diverifikasi terlebih dahulu sebelum dihitung ke donasi terkumpul.</p>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="form-control mt-4">Lanjutkan Donasi</button>
                        </form>
                        </div>
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
                        <img src="/logo.png" class="logo img-fluid" alt="Logo {{ $hmiProfile->organization_name }}">
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
                        <li class="footer-menu-item"><a href="/#tentang" class="footer-menu-link">Tentang Kami</a></li>
                        <li class="footer-menu-item"><a href="/#program" class="footer-menu-link">Program Prioritas</a></li>
                        <li class="footer-menu-item"><a href="/galeri" class="footer-menu-link">Galeri</a></li>
                        <li class="footer-menu-item"><a href="/#kontak" class="footer-menu-link">Hubungi Kami</a></li>
                        <li class="footer-menu-item"><a href="/donasi" class="footer-menu-link">Donasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mx-auto">
                    <h5 class="site-footer-title mb-3">Kontak</h5>

                    <p class="text-white d-flex">
                        <i class="bi-envelope me-2"></i>
                        <a href="mailto:{{ $hmiProfile->contact_email }}" class="site-footer-link">{{ $hmiProfile->contact_email }}</a>
                    </p>

                    <p class="text-white d-flex mt-3">
                        <i class="bi-heart-pulse me-2"></i>
                        {{ $hmiProfile->footer_description }}
                    </p>

                    <a href="/" class="custom-btn btn mt-3">Kembali ke Home</a>
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
                        <ul class="social-icon">
                            <li class="social-icon-item"><a href="{{ $hmiProfile->facebook_url ?: '#' }}" class="social-icon-link bi-facebook" @if(filled($hmiProfile->facebook_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                            <li class="social-icon-item"><a href="{{ $hmiProfile->instagram_url ?: '#' }}" class="social-icon-link bi-instagram" @if(filled($hmiProfile->instagram_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                            <li class="social-icon-item"><a href="{{ $hmiProfile->youtube_url ?: '#' }}" class="social-icon-link bi-youtube" @if(filled($hmiProfile->youtube_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                            <li class="social-icon-item"><a href="{{ $hmiProfile->whatsapp_link ?: '#' }}" class="social-icon-link bi-whatsapp" @if(filled($hmiProfile->whatsapp_link)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.sticky.js"></script>
    <script src="/js/counter.js"></script>
    <script src="/js/custom.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paymentOptions = document.querySelectorAll('.js-payment-option');
            const paymentDetails = document.querySelectorAll('[data-payment-detail]');
            const proofInput = document.getElementById('payment-proof');
            const proofBox = document.querySelector('.proof-upload-box');
            const proofText = document.querySelector('.js-proof-text');
            const amountInput = document.getElementById('donation-amount');
            const amountPresets = document.querySelectorAll('.js-amount-preset');
            const donationProgramSelect = document.getElementById('donation-program');
            const programPreview = document.getElementById('program-preview');
            const programPreviewData = @json($programPreviewData);

            const formatAmount = function (value) {
                const digits = String(value || '').replace(/\D+/g, '');

                if (!digits) {
                    return '';
                }

                return Number(digits).toLocaleString('id-ID');
            };

            const getAmountDigits = function () {
                return amountInput ? amountInput.value.replace(/\D+/g, '') : '';
            };

            const syncAmountPresets = function () {
                const selectedAmount = getAmountDigits();

                amountPresets.forEach(function (button) {
                    const isActive = button.dataset.amountValue === selectedAmount;
                    button.classList.toggle('is-active', isActive);
                    button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                });
            };

            const renderProgramPreview = function (selectedSlug) {
                if (!programPreview) {
                    return;
                }

                const data = selectedSlug ? programPreviewData[selectedSlug] : null;

                programPreview.classList.toggle('is-empty', !data);

                if (!data) {
                    return;
                }

                const title = programPreview.querySelector('.js-program-title');
                const summary = programPreview.querySelector('.js-program-summary');
                const progressLabel = programPreview.querySelector('.js-program-progress-label');
                const status = programPreview.querySelector('.js-program-status');
                const statusDetail = programPreview.querySelector('.js-program-status-detail');
                const received = programPreview.querySelector('.js-program-received');
                const target = programPreview.querySelector('.js-program-target');
                const days = programPreview.querySelector('.js-program-days');
                const progressFill = programPreview.querySelector('.js-program-progress-fill');

                title.textContent = data.title || '';
                summary.textContent = data.summary || '';
                progressLabel.textContent = 'Tercapai: ' + (data.progress_label || '0%');
                status.textContent = 'Status: ' + (data.status || '-');
                statusDetail.textContent = data.status || '-';
                received.textContent = data.received_amount || '-';
                target.textContent = data.target_amount || '-';
                days.textContent = data.remaining_days_label || '-';
                progressFill.style.width = Math.max(0, Math.min(100, Number(data.progress_percentage || 0))) + '%';
            };

            const togglePaymentDetail = function (selectedValue) {
                paymentDetails.forEach(function (detail) {
                    detail.classList.toggle('is-active', detail.dataset.paymentDetail === selectedValue);
                });
            };

            paymentOptions.forEach(function (option) {
                option.addEventListener('change', function () {
                    togglePaymentDetail(this.value);
                });

                if (option.checked) {
                    togglePaymentDetail(option.value);
                }
            });

            if (proofInput && proofBox && proofText) {
                proofInput.addEventListener('change', function () {
                    const fileName = this.files && this.files.length ? this.files[0].name : '';
                    proofBox.classList.toggle('has-file', Boolean(fileName));
                    proofText.textContent = fileName || 'Pilih file gambar atau PDF sebagai bukti pembayaran.';
                });
            }

            if (donationProgramSelect) {
                donationProgramSelect.addEventListener('change', function () {
                    renderProgramPreview(this.value);
                });

                renderProgramPreview(donationProgramSelect.value);
            }

            if (amountInput) {
                amountInput.value = formatAmount(amountInput.value);

                amountInput.addEventListener('input', function () {
                    this.value = formatAmount(this.value);
                    syncAmountPresets();
                });

                amountPresets.forEach(function (button) {
                    button.addEventListener('click', function () {
                        amountInput.value = formatAmount(this.dataset.amountValue);
                        syncAmountPresets();
                        amountInput.focus();
                    });
                });

                syncAmountPresets();
            }
        });
    </script>
</body>

</html>

