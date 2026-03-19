<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $program['summary'] }}">
    <meta name="author" content="HMI Peduli">
    <title>HMI Peduli | {{ $program['title'] }}</title>
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
                url("{{ $program['hero_image'] }}") center center / cover no-repeat;
        }

        .news-block,
        .search-form,
        .category-block,
        .tags-block,
        .subscribe-form {
            box-shadow: 0 18px 50px rgba(15, 23, 32, 0.08);
        }

        .program-meta-line {
            gap: 18px;
        }

        .news-block-info .news-category-block {
            position: static;
            inset: auto;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 0;
            background: transparent;
        }

        .news-block-info .news-category-block .category-block-link {
            margin: 0;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(84, 191, 208, 0.16);
            color: var(--secondary-color);
            font-weight: 600;
            line-height: 1;
        }

        .program-sidebar-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 18px 50px rgba(15, 23, 32, 0.08);
            padding: 28px;
            margin-top: 28px;
        }

        .program-focus-list {
            padding-left: 0;
            margin-bottom: 0;
        }

        .program-focus-list li {
            list-style: none;
            margin-bottom: 14px;
        }

        .program-focus-list i {
            color: var(--secondary-color);
            margin-right: 8px;
        }

        .detail-cta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .detail-cta .btn {
            min-width: 180px;
        }

        .program-gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .program-gallery-thumb {
            border: 0;
            padding: 0;
            border-radius: 18px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 10px 24px rgba(15, 23, 32, 0.08);
        }

        .program-gallery-thumb img {
            width: 100%;
            height: 110px;
            object-fit: cover;
            transition: transform 0.25s ease;
        }

        .program-gallery-thumb:hover img {
            transform: scale(1.04);
        }

        .program-gallery-thumb.is-video {
            position: relative;
        }

        .program-gallery-thumb.is-video::after {
            content: "\f4f4";
            font-family: bootstrap-icons;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: rgba(15, 23, 32, 0.72);
            color: #fff;
            font-size: 18px;
            pointer-events: none;
        }

        .gallery-modal .modal-content {
            background: transparent;
            border: 0;
        }

        .gallery-modal .modal-header {
            border: 0;
            padding-bottom: 0;
        }

        .gallery-modal .btn-close {
            filter: invert(1);
            opacity: 0.95;
        }

        .gallery-modal .carousel-item img {
            width: 100%;
            max-height: 78vh;
            object-fit: contain;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.08);
        }

        .gallery-modal .carousel-item video {
            width: 100%;
            max-height: 78vh;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.08);
        }

        .gallery-modal .carousel-control-prev,
        .gallery-modal .carousel-control-next {
            width: 12%;
        }

        .site-footer .logo {
            max-width: 140px;
        }
    </style>
</head>

<body>
    @php
        $mediaItems = collect(array_merge([$program['hero_image']], $program['gallery']))
            ->map(function ($item) use ($program) {
                if (is_string($item)) {
                    $extension = strtolower(pathinfo($item, PATHINFO_EXTENSION));

                    if (in_array($extension, ['mp4', 'webm', 'ogg'], true)) {
                        return [
                            'type' => 'video',
                            'src' => $item,
                            'poster' => $program['hero_image'],
                            'thumb' => $program['hero_image'],
                        ];
                    }

                    return [
                        'type' => 'image',
                        'src' => $item,
                        'thumb' => $item,
                    ];
                }

                $type = $item['type'] ?? 'image';

                return [
                    'type' => $type,
                    'src' => $item['src'] ?? '',
                    'thumb' => $item['thumb'] ?? ($item['poster'] ?? ($item['src'] ?? $program['hero_image'])),
                    'poster' => $item['poster'] ?? $program['hero_image'],
                ];
            })
            ->values();
    @endphp
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
                <img src="/logo.png" class="logo img-fluid" alt="Logo HMI Peduli">
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
                    <li class="nav-item"><a class="nav-link" href="/ruang-donasi">Semua Ruang Donasi</a></li>
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
                        <h1 class="text-white">{{ $program['title'] }}</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="news-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="news-block">
                            <div class="news-block-info">
                                <div class="news-category-block mb-4">
                                    @foreach ($program['categories'] as $category)
                                        <a href="#" class="category-block-link">{{ $category }}</a>
                                    @endforeach
                                </div>

                                <div class="d-flex flex-wrap mt-2 program-meta-line">
                                    <div class="news-block-date">
                                        <p><i class="bi-bar-chart-line custom-icon me-1"></i>Tercapai {{ $program['progress'] }}</p>
                                    </div>
                                    <div class="news-block-author">
                                        <p><i class="bi-people custom-icon me-1"></i>Status {{ $program['status'] }}</p>
                                    </div>
                                    <div class="news-block-author">
                                        <p><i class="bi-clock custom-icon me-1"></i>{{ $program['remaining_days_label'] }}</p>
                                    </div>
                                </div>

                                <div class="news-block-title mb-2">
                                    <h4>{{ $program['title'] }}</h4>
                                </div>

                                <div class="news-block-body">
                                    <p><strong>{{ $program['summary'] }}</strong></p>
                                    <p>{{ $program['lead'] }}</p>
                                    @foreach ($program['description'] as $paragraph)
                                        <p>{{ $paragraph }}</p>
                                    @endforeach

                                    <blockquote>{{ $program['quote'] }}</blockquote>
                                </div>

                                <div class="detail-cta">
                                    <a href="{{ url('/donasi?program=' . $program['slug']) }}" class="custom-btn btn">Bantu Sekarang</a>
                                    <a href="/ruang-donasi" class="custom-btn custom-border-btn btn">Lihat Program Lain</a>
                                </div>

                                <div class="social-share border-top mt-5 py-4 d-flex flex-wrap align-items-center">
                                    <div class="tags-block me-auto">
                                        @foreach ($program['categories'] as $category)
                                            <a href="#" class="tags-block-link">{{ $category }}</a>
                                        @endforeach
                                        <a href="#" class="tags-block-link">Donasi</a>
                                    </div>

                                    <div class="d-flex">
                                        <a href="#" class="social-icon-link bi-facebook"></a>
                                        <a href="#" class="social-icon-link bi-twitter"></a>
                                        <a href="#" class="social-icon-link bi-envelope"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mx-auto mt-4 mt-lg-0">
                        <div class="program-sidebar-card">
                            <h5 class="mb-3">Fokus Program</h5>
                            <ul class="program-focus-list">
                                @foreach ($program['focus'] as $focus)
                                    <li><i class="bi-check2-circle"></i>{{ $focus }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="program-sidebar-card">
                            <h5 class="mb-3">Ringkasan</h5>
                            <p class="mb-2"><strong>Progress:</strong> {{ $program['progress'] }}</p>
                            <p class="mb-2"><strong>Terkumpul:</strong> {{ $program['received_amount'] }}</p>
                            <p class="mb-2"><strong>Target:</strong> {{ $program['target_amount'] }}</p>
                            <p class="mb-2"><strong>Sisa Target:</strong> {{ $program['remaining_amount'] }}</p>
                            <p class="mb-2"><strong>Mulai:</strong> {{ $program['start_date'] ?? '-' }}</p>
                            <p class="mb-2"><strong>Akhir:</strong> {{ $program['end_date'] ?? '-' }}</p>
                            <p class="mb-2"><strong>Periode:</strong> {{ $program['remaining_days_label'] }}</p>
                            <p class="mb-2"><strong>Status:</strong> {{ $program['status'] }}</p>
                            <p class="mb-0"><strong>Kategori:</strong> {{ implode(', ', $program['categories']) }}</p>
                        </div>

                        <div class="program-sidebar-card">
                            <h5 class="mb-3">Galeri Program</h5>
                            <div class="program-gallery-grid">
                                @foreach ($mediaItems as $index => $media)
                                    <button type="button" class="program-gallery-thumb js-gallery-thumb {{ $media['type'] === 'video' ? 'is-video' : '' }}" data-index="{{ $index }}" data-bs-toggle="modal" data-bs-target="#programGalleryModal" aria-label="Lihat media {{ $index + 1 }}">
                                        <img src="{{ $media['thumb'] }}" alt="{{ $program['title'] }} media {{ $index + 1 }}">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="modal fade gallery-modal" id="programGalleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-2">
                    <div id="programGalleryCarousel" class="carousel slide" data-bs-touch="true">
                        <div class="carousel-inner">
                            @foreach ($mediaItems as $index => $media)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    @if ($media['type'] === 'video')
                                        <video controls preload="metadata" poster="{{ $media['poster'] ?? $program['hero_image'] }}">
                                            <source src="{{ $media['src'] }}">
                                            Browser kamu belum mendukung video.
                                        </video>
                                    @else
                                        <img src="{{ $media['src'] }}" alt="{{ $program['title'] }} gambar {{ $index + 1 }}">
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#programGalleryCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#programGalleryCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4">
                    <img src="/logo.png" class="logo img-fluid" alt="Logo HMI Peduli">
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

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.sticky.js"></script>
    <script src="/js/counter.js"></script>
    <script src="/js/custom.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carouselElement = document.getElementById('programGalleryCarousel');
            const modalElement = document.getElementById('programGalleryModal');
            const thumbs = document.querySelectorAll('.js-gallery-thumb');

            if (!carouselElement || !thumbs.length || !window.bootstrap) {
                return;
            }

            const carousel = bootstrap.Carousel.getOrCreateInstance(carouselElement, {
                interval: false,
                ride: false
            });

            const pauseVideos = function () {
                carouselElement.querySelectorAll('video').forEach(function (video) {
                    video.pause();
                });
            };

            thumbs.forEach((thumb) => {
                thumb.addEventListener('click', function () {
                    pauseVideos();
                    carousel.to(Number(this.dataset.index || 0));
                });
            });

            carouselElement.addEventListener('slide.bs.carousel', pauseVideos);

            if (modalElement) {
                modalElement.addEventListener('hidden.bs.modal', pauseVideos);
            }
        });
    </script>
</body>

</html>
