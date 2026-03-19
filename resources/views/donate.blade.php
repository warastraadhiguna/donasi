<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Halaman donasi HMI Peduli untuk mendukung program pendidikan, pangan, kesehatan, dan aksi kemanusiaan.">
    <meta name="author" content="HMI Peduli">

    <title>HMI Peduli | Halaman Donasi</title>
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

        .donate-section {
            background:
                linear-gradient(135deg, rgba(15, 23, 32, 0.82), rgba(18, 63, 74, 0.74)),
                url("/images/slide/medium-shot-people-collecting-donations.jpg") center center / cover no-repeat;
        }

        .site-footer .logo {
            max-width: 140px;
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
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="donation-section-card">
                                        <h5>Nominal Donasi</h5>
                                        <div class="input-group mb-0">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="text" class="form-control" name="amount" id="donation-amount" value="{{ old('amount') }}" placeholder="Tuliskan jumlah nominal"
                                                aria-label="Nominal donasi" aria-describedby="basic-addon1">
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
                                                id="payment-transfer" value="Transfer" {{ old('payment_method') === 'Transfer' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="payment-transfer">
                                                <i class="bi-bank custom-icon ms-1"></i>
                                                Transfer
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input js-payment-option" type="radio" name="payment_method"
                                                id="payment-qris" value="QRIS" {{ old('payment_method') === 'QRIS' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="payment-qris">
                                                <i class="bi-qr-code custom-icon ms-1"></i>
                                                QRIS
                                            </label>
                                        </div>

                                        <div id="payment-transfer-detail" class="payment-detail-card" data-payment-detail="Transfer">
                                            <span class="payment-detail-label">Rekening Transfer</span>
                                            <p class="mb-2"><strong>Nama Bank:</strong> {{ $hmiProfile->transfer_bank_name }}</p>
                                            <p class="mb-2"><strong>No. Rekening:</strong> {{ $hmiProfile->transfer_account_number }}</p>
                                            <p class="mb-0"><strong>Nama Pemilik:</strong> {{ $hmiProfile->transfer_account_holder }}</p>
                                        </div>

                                        <div id="payment-qris-detail" class="payment-detail-card text-center" data-payment-detail="QRIS">
                                            @if (filled($hmiProfile->qris_image_url))
                                                <img src="{{ $hmiProfile->qris_image_url }}" class="img-fluid rounded-4 mb-3" alt="QRIS {{ $hmiProfile->organization_name }}">
                                            @else
                                                <div class="qris-dummy">
                                                    <div class="qris-dummy-badge">QRIS</div>
                                                </div>
                                            @endif
                                            <span class="payment-detail-label">QR Bayar</span>
                                            <p class="mb-0">{{ filled($hmiProfile->qris_image_url) ? 'Scan QRIS ini untuk pembayaran.' : 'Scan QRIS dummy ini untuk simulasi pembayaran.' }}</p>
                                        </div>

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
                    <img src="/logo.png" class="logo img-fluid" alt="Logo HMI Peduli">
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
            const paymentOptions = document.querySelectorAll('.js-payment-option');
            const paymentDetails = document.querySelectorAll('[data-payment-detail]');
            const proofInput = document.getElementById('payment-proof');
            const proofBox = document.querySelector('.proof-upload-box');
            const proofText = document.querySelector('.js-proof-text');

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
        });
    </script>
</body>

</html>
