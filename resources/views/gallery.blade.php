<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Galeri foto dan video dari seluruh ruang donasi HMI Peduli.">
    <meta name="author" content="HMI Peduli">
    <title>HMI Peduli | Galeri Program</title>
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

        body {
            background: linear-gradient(180deg, #ffffff 0%, #f7fbfc 100%);
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

        .gallery-hero {
            padding: 118px 0 56px;
            background:
                linear-gradient(135deg, rgba(15, 23, 32, 0.85), rgba(18, 63, 74, 0.72)),
                url("/images/different-people-doing-volunteer-work.jpg") center center / cover no-repeat;
            position: relative;
        }

        .gallery-hero::after {
            content: "";
            position: absolute;
            inset: auto 0 0 0;
            height: 72px;
            background: linear-gradient(180deg, rgba(247, 252, 253, 0), rgba(247, 252, 253, 1));
        }

        .gallery-hero-copy {
            position: relative;
            z-index: 1;
        }

        .gallery-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .gallery-hero h1,
        .gallery-hero p {
            color: #fff;
        }

        .gallery-hero h1 {
            margin: 14px 0 0;
            font-size: clamp(34px, 4.8vw, 52px);
            line-height: 1.02;
        }

        .gallery-section {
            padding: 20px 0 100px;
        }

        .gallery-section-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: end;
            gap: 16px;
            margin-bottom: 30px;
        }

        .gallery-section-header h2 {
            margin-bottom: 0;
        }

        .gallery-grid {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 1.5rem;
        }

        .gallery-card {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 26px;
            overflow: hidden;
            border: 0;
            padding: 0;
            background: #fff;
            box-shadow: 0 18px 50px rgba(15, 23, 32, 0.08);
            text-align: left;
        }

        .gallery-card-media {
            position: relative;
        }

        .gallery-card-media img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            display: block;
        }

        .gallery-card.is-video .gallery-card-media::after {
            content: "\f4f4";
            font-family: bootstrap-icons;
            position: absolute;
            inset: 50% auto auto 50%;
            transform: translate(-50%, -50%);
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: rgba(15, 23, 32, 0.72);
            color: #fff;
            font-size: 24px;
            pointer-events: none;
        }

        .gallery-card-tag {
            position: absolute;
            top: 16px;
            left: 16px;
            z-index: 1;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.92);
            color: var(--dark-color);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .gallery-card-info {
            position: absolute;
            inset: auto 0 0 0;
            padding: 54px 16px 16px;
            background: linear-gradient(180deg, rgba(15, 23, 32, 0), rgba(15, 23, 32, 0.86));
            color: #fff;
        }

        .gallery-card-info h5 {
            color: #fff;
            margin-bottom: 0;
            font-size: 26px;
            line-height: 1.15;
        }

        .gallery-empty {
            padding: 48px 28px;
            border-radius: 26px;
            background: #fff;
            box-shadow: 0 18px 50px rgba(15, 23, 32, 0.08);
            text-align: center;
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

        .gallery-modal .carousel-item img,
        .gallery-modal .carousel-item video {
            width: 100%;
            max-height: 78vh;
            object-fit: contain;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.08);
        }

        .gallery-modal .carousel-control-prev,
        .gallery-modal .carousel-control-next {
            width: 12%;
        }

        .gallery-pagination {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-top: 40px;
        }

        .gallery-pagination .page-link {
            min-width: 46px;
            height: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 16px;
            border-radius: 999px;
            border: 1px solid rgba(18, 63, 74, 0.12);
            background: #fff;
            color: var(--dark-color);
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 12px 28px rgba(15, 23, 32, 0.06);
        }

        .gallery-pagination .page-link.is-active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }

        .gallery-pagination .page-link.is-disabled {
            opacity: 0.45;
            pointer-events: none;
        }

        .site-footer .logo {
            max-width: 140px;
        }

        @media screen and (max-width: 991px) {
            .gallery-hero {
                padding: 108px 0 46px;
            }

            .gallery-card-media img {
                height: 210px;
            }

            .gallery-card-info h5 {
                font-size: 21px;
            }
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
                        <li class="social-icon-item"><a href="{{ $hmiProfile->instagram_url ?: '#' }}" class="social-icon-link bi-instagram" @if(filled($hmiProfile->instagram_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                        <li class="social-icon-item"><a href="{{ $hmiProfile->facebook_url ?: '#' }}" class="social-icon-link bi-facebook" @if(filled($hmiProfile->facebook_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
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
                <span>HMI Peduli</span>
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
                    <li class="nav-item"><a class="nav-link active" href="/galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#kontak">Hubungi Kami</a></li>
                    <li class="nav-item ms-3"><a class="nav-link custom-btn custom-border-btn btn" href="/donasi">Donasi Sekarang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="gallery-hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="gallery-hero-copy text-center">
                            <span class="gallery-badge"><i class="bi-images"></i>Dokumentasi</span>
                            <h1>Galeri</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery-section">
            <div class="container">
                <div class="gallery-section-header">
                    <div>
                        <span class="program-pill">Galeri Terpadu</span>
                        <h2 class="mt-2">Dokumentasi dari seluruh ruang donasi</h2>
                    </div>
                    <a href="/ruang-donasi" class="custom-btn custom-border-btn btn">Lihat Semua Ruang Donasi</a>
                </div>

                <div class="row gallery-grid">
                    @forelse ($galleryItems as $index => $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <button type="button" class="gallery-card {{ $item['type'] === 'video' ? 'is-video' : '' }} js-gallery-thumb" data-index="{{ $index }}" data-bs-toggle="modal" data-bs-target="#siteGalleryModal">
                                <div class="gallery-card-media">
                                    <span class="gallery-card-tag">{{ $item['type'] === 'video' ? 'Video' : 'Foto' }}</span>
                                    <img src="{{ $item['thumb'] }}" alt="{{ $item['program_title'] }}">
                                    <div class="gallery-card-info">
                                        <h5>{{ $item['program_title'] }}</h5>
                                    </div>
                                </div>
                            </button>
                        </div>
                    @empty
                        <div class="col-lg-12 col-12">
                            <div class="gallery-empty">
                                <h5 class="mb-2">Belum ada media galeri</h5>
                                <p class="mb-0">Tambahkan foto atau video pada ruang donasi agar halaman galeri mulai terisi.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                @if ($galleryItems->lastPage() > 1)
                    <div class="gallery-pagination">
                        <a href="{{ $galleryItems->previousPageUrl() ?: '#' }}" class="page-link {{ $galleryItems->onFirstPage() ? 'is-disabled' : '' }}">Prev</a>

                        @for ($page = 1; $page <= $galleryItems->lastPage(); $page++)
                            <a href="{{ $galleryItems->url($page) }}" class="page-link {{ $galleryItems->currentPage() === $page ? 'is-active' : '' }}">{{ $page }}</a>
                        @endfor

                        <a href="{{ $galleryItems->hasMorePages() ? $galleryItems->nextPageUrl() : '#' }}" class="page-link {{ $galleryItems->hasMorePages() ? '' : 'is-disabled' }}">Next</a>
                    </div>
                @endif
            </div>
        </section>
    </main>

    <div class="modal fade gallery-modal" id="siteGalleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-2">
                    <div id="siteGalleryCarousel" class="carousel slide" data-bs-touch="true">
                        <div class="carousel-inner">
                            @foreach ($galleryItems as $index => $item)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    @if ($item['type'] === 'video')
                                        <video controls preload="metadata" poster="{{ $item['poster'] }}">
                                            <source src="{{ $item['src'] }}">
                                            Browser kamu belum mendukung video.
                                        </video>
                                    @else
                                        <img src="{{ $item['src'] }}" alt="{{ $item['program_title'] }} media {{ $index + 1 }}">
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#siteGalleryCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#siteGalleryCarousel" data-bs-slide="next">
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
                            <li class="social-icon-item"><a href="{{ $hmiProfile->instagram_url ?: '#' }}" class="social-icon-link bi-instagram" @if(filled($hmiProfile->instagram_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
                            <li class="social-icon-item"><a href="{{ $hmiProfile->facebook_url ?: '#' }}" class="social-icon-link bi-facebook" @if(filled($hmiProfile->facebook_url)) target="_blank" rel="noopener noreferrer" @endif></a></li>
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
    <script src="/js/custom.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carouselElement = document.getElementById('siteGalleryCarousel');
            const modalElement = document.getElementById('siteGalleryModal');
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

            thumbs.forEach(function (thumb) {
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
