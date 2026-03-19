<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Halaman semua ruang donasi HMI Peduli untuk melihat daftar program yang bisa didukung.">
    <meta name="author" content="HMI Peduli">
    <title>HMI Peduli | Semua Ruang Donasi</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
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

        .navbar-brand small {
            color: var(--primary-color);
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .news-detail-header-section {
            background:
                linear-gradient(135deg, rgba(15, 23, 32, 0.82), rgba(18, 63, 74, 0.72)),
                url("images/slide/medium-shot-people-collecting-donations.jpg") center center / cover no-repeat;
        }

        .news-block-top a {
            display: block;
        }

        .news-block-top img {
            width: 100%;
            height: 330px;
            object-fit: cover;
        }

        .news-section .news-block {
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 18px 50px rgba(15, 23, 32, 0.08);
            background: #fff;
        }

        .news-block-info {
            padding: 14px 30px 26px;
        }

        .donation-grid {
            align-items: stretch;
            --bs-gutter-y: 1.75rem;
        }

        .donation-grid > div {
            display: flex;
        }

        .donation-card {
            display: flex;
            flex-direction: column;
        }

        .donation-card .news-block-top img {
            height: 220px;
        }

        .donation-card .news-block {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .donation-card .news-block-info {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .donation-card .news-block-title {
            min-height: 3.5rem;
        }

        .donation-card .news-block-body {
            min-height: 5.5rem;
        }

        .donation-card .custom-btn {
            margin-top: auto;
        }

        @media screen and (max-width: 991px) {
            .donation-card .news-block-top img {
                height: 210px;
            }

            .donation-card .news-block-title,
            .donation-card .news-block-body {
                min-height: 0;
            }
        }

        .search-form,
        .category-block,
        .tags-block,
        .subscribe-form {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 18px 50px rgba(15, 23, 32, 0.08);
            padding: 28px;
        }

        .category-block,
        .tags-block,
        .subscribe-form {
            margin-top: 28px;
            margin-bottom: 0;
        }

        .sidebar-note {
            background: linear-gradient(180deg, #ffffff 0%, #f7fbfc 100%);
            border-radius: 24px;
            box-shadow: 0 18px 50px rgba(15, 23, 32, 0.08);
            padding: 28px;
            margin-top: 28px;
        }

        .news-category-block {
            background: rgba(18, 63, 74, 0.92);
        }

        .site-footer .logo {
            max-width: 140px;
        }
    </style>
</head>

<body>
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-heart-pulse me-2"></i>
                        {{ $hmiProfile->header_tagline }}
                    </p>
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
                        <li class="social-icon-item"><a href="{{ $hmiProfile->whatsapp_url ?: '#' }}" class="social-icon-link bi-whatsapp" @if(filled($hmiProfile->whatsapp_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="logo.png" class="logo img-fluid" alt="Logo HMI Peduli">
                <span>
                    HMI Peduli
                    <small>Charity &amp; Donasi</small>
                </span>
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
        <section class="news-detail-header-section text-center">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <h1 class="text-white">Semua Ruang Donasi</h1>
                        <p class="text-white mb-0">Lihat seluruh program yang sedang dibuka dan pilih ruang donasi yang paling sesuai untuk kamu dukung.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="news-section section-padding">
            <div class="container">
                <div class="row donation-grid">
                    @forelse ($programs as $program)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 donation-card">
                            <div class="news-block">
                                <div class="news-block-top">
                                    <a href="{{ route('program.detail', $program) }}">
                                        <img src="{{ $program->hero_image_url }}" class="news-image img-fluid" alt="{{ $program->title }}">
                                    </a>
                                    <div class="news-category-block">
                                        @foreach ($program->categories ?? [] as $category)
                                            <a href="#" class="category-block-link">{{ $category }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="news-block-info">
                                    <div class="d-flex mt-2">
                                        <div class="news-block-date"><p><i class="bi-bar-chart-line custom-icon me-1"></i>Tercapai {{ $program->progress_label }}</p></div>
                                        <div class="news-block-author mx-5"><p><i class="bi-people custom-icon me-1"></i>{{ $program->status }}</p></div>
                                    </div>
                                    <div class="news-block-title mb-2">
                                        <h4><a href="{{ route('program.detail', $program) }}" class="news-block-title-link">{{ $program->title }}</a></h4>
                                    </div>
                                    <div class="news-block-body">
                                        <p>{{ \Illuminate\Support\Str::limit($program->summary, 145) }}</p>
                                        <p class="mb-1"><strong>Terkumpul:</strong> {{ $program->formatted_received_amount }}</p>
                                        <p class="mb-1"><strong>Target:</strong> {{ $program->formatted_target_amount }}</p>
                                        <p class="mb-0"><strong>{{ $program->remaining_days_label }}</strong></p>
                                    </div>
                                    <a href="{{ route('program.detail', $program) }}" class="custom-btn btn mt-3">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 col-12">
                            <div class="search-form text-center">
                                <h5 class="mb-2">Belum ada ruang donasi</h5>
                                <p class="mb-0">Silakan tambahkan program pertama dari panel admin.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4">
                    <img src="logo.png" class="logo img-fluid" alt="Logo HMI Peduli">
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <h5 class="site-footer-title mb-3">Navigasi Cepat</h5>
                    <ul class="footer-menu">
                        <li class="footer-menu-item"><a href="/" class="footer-menu-link">Home</a></li>
                        <li class="footer-menu-item"><a href="/#tentang" class="footer-menu-link">Tentang Kami</a></li>
                        <li class="footer-menu-item"><a href="/#program" class="footer-menu-link">Program Prioritas</a></li>
                        <li class="footer-menu-item"><a href="/galeri" class="footer-menu-link">Galeri</a></li>
                        <li class="footer-menu-item"><a href="/ruang-donasi" class="footer-menu-link">Semua Ruang Donasi</a></li>
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
                        <ul class="social-icon">
                            <li class="social-icon-item"><a href="{{ $hmiProfile->facebook_url ?: '#' }}" class="social-icon-link bi-facebook" @if(filled($hmiProfile->facebook_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                            <li class="social-icon-item"><a href="{{ $hmiProfile->instagram_url ?: '#' }}" class="social-icon-link bi-instagram" @if(filled($hmiProfile->instagram_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                            <li class="social-icon-item"><a href="{{ $hmiProfile->youtube_url ?: '#' }}" class="social-icon-link bi-youtube" @if(filled($hmiProfile->youtube_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                            <li class="social-icon-item"><a href="{{ $hmiProfile->whatsapp_url ?: '#' }}" class="social-icon-link bi-whatsapp" @if(filled($hmiProfile->whatsapp_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
