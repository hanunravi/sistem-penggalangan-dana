@extends('layouts.front')

@section('content')

    <!-- ==============================================
         1. HERO SECTION (Banner Utama)
    =============================================== -->
    <section class="hero-section hero-3">
        <div class="hero-shape">
             <img src="{{ asset('assets/landing/img/hero/love-shape.png') }}" alt="shape">
        </div>
        <div class="hero-shape-2">
             <img src="{{ asset('assets/landing/img/hero/shap.png') }}" alt="shape">
        </div>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">
                            Uluran Tanganmu <br> Harapan Bagi Mereka.
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".5s">
                            Ribuan saudara kita terdampak bencana. Mari bersatu berikan bantuan <br>
                            logistik, medis, dan hunian darurat sekarang juga.
                        </p>
                        <div class="mt-4 wow fadeInUp" data-wow-delay=".6s">
                            <a href="#pilihan-donasi" class="theme-btn">Donasi Sekarang</a>
                            <a href="#campaign-lain" class="theme-btn style-2 ms-3">Lihat Campaign Lain</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="swiper hero-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="hero-image">
                                    <img src="{{ asset('assets/landing/img/sumatra/4.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-image">
                                    <img src="{{ asset('assets/landing/img/sumatra/7.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-image">
                                    <img src="{{ asset('assets/landing/img/sumatra/8.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-image">
                                    <img src="{{ asset('assets/landing/img/sumatra/2.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-image">
                                    <img src="{{ asset('assets/landing/img/sumatra/1.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
         2. BRAND SECTION (Metode Pembayaran)
    =============================================== -->
    <div class="brand-section-2 section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Metode Pembayaran Resmi</span>
            </div>
            <div class="brand-box-items justify-content-center">
                <div class="single-brand-items wow fadeInUp">
                    <div class="brand-image">
                        <img src="{{ asset('assets/landing/img/brand/b1.png') }}" alt="GoPay">
                    </div>
                </div>
                <div class="single-brand-items wow fadeInUp" data-wow-delay=".2s">
                    <div class="brand-image">
                        <img src="{{ asset('assets/landing/img/brand/b2.png') }}" alt="OVO">
                    </div>
                </div>
                <div class="single-brand-items wow fadeInUp" data-wow-delay=".4s">
                    <div class="brand-image">
                        <img src="{{ asset('assets/landing/img/brand/b3.png') }}" alt="BCA">
                    </div>
                </div>
                <div class="single-brand-items wow fadeInUp" data-wow-delay=".6s">
                    <div class="brand-image">
                        <img src="{{ asset('assets/landing/img/brand/b4.png') }}" alt="BRI">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==============================================
         3. STATISTIK & DONATUR TERBARU
    =============================================== -->
    
    <!-- Bagian A: Statistik Uang -->
    <section class="funfact-section section-padding fix header-bg">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="text-white wow fadeInUp">Update Terkini</h2>
                <p class="text-white">Transparansi jumlah bantuan yang telah masuk.</p>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="funfact-items">
                        <div class="icon">
                            <img src="{{ asset('assets/landing/img/icon/05.svg') }}" alt="icon">
                        </div>
                        <div class="content">
                            <h2>Rp <span class="count">850</span>Jt</h2>
                            <p>Dana Terkumpul</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="funfact-items">
                        <div class="icon">
                            <img src="{{ asset('assets/landing/img/icon/06.svg') }}" alt="icon">
                        </div>
                        <div class="content">
                            <h2><span class="count">1250</span>+</h2>
                            <p>Orang Baik</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="funfact-items">
                        <div class="icon">
                            <img src="{{ asset('assets/landing/img/icon/07.svg') }}" alt="icon">
                        </div>
                        <div class="content">
                            <h2><span class="count">15</span></h2>
                            <p>Titik Bencana</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="funfact-items">
                        <div class="icon">
                            <img src="{{ asset('assets/landing/img/icon/08.svg') }}" alt="icon">
                        </div>
                        <div class="content">
                            <h2><span class="count">5</span>rb+</h2>
                            <p>Paket Tersalurkan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian B: List Donatur Terbaru -->
    <section class="choose-us-section section-padding fix">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Terima Kasih</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Donatur Terbaru
                </h2>
                <p>Doa dan dukungan dari para orang baik yang baru saja berdonasi.</p>
            </div>
            <div class="row g-4 justify-content-between">
                {{-- Donatur 1 --}}
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="choose-us-items">
                        <div class="icon">
                            <i class="fas fa-user-circle fa-3x text-primary"></i>
                        </div>
                        <div class="content">
                            <h4>Hamba Allah</h4>
                            <h5 class="text-success">Rp 500.000</h5>
                            <p>"Semoga berkah." <br><small class="text-muted">- 5 menit lalu</small></p>
                        </div>
                    </div>
                </div>
                {{-- Donatur 2 --}}
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="choose-us-items">
                        <div class="icon">
                            <i class="fas fa-user-circle fa-3x text-primary"></i>
                        </div>
                        <div class="content">
                            <h4>Budi Santoso</h4>
                            <h5 class="text-success">Rp 100.000</h5>
                            <p>"Sehat selalu relawan." <br><small class="text-muted">- 10 menit lalu</small></p>
                        </div>
                    </div>
                </div>
                {{-- Donatur 3 --}}
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="choose-us-items">
                        <div class="icon">
                            <i class="fas fa-user-circle fa-3x text-primary"></i>
                        </div>
                        <div class="content">
                            <h4>Siti Aminah</h4>
                            <h5 class="text-success">Rp 50.000</h5>
                            <p>"Sedikit rezeki." <br><small class="text-muted">- 15 menit lalu</small></p>
                        </div>
                    </div>
                </div>
                {{-- Donatur 4 --}}
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                    <div class="choose-us-items">
                        <div class="icon">
                            <i class="fas fa-user-circle fa-3x text-primary"></i>
                        </div>
                        <div class="content">
                            <h4>Anonim</h4>
                            <h5 class="text-success">Rp 1.000.000</h5>
                            <p>"Bangun sekolah lagi." <br><small class="text-muted">- 20 menit lalu</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
         4. VIDEO DOCUMENTATION
    =============================================== -->
    <div class="vedio-area fix bg-cover" style="background-image: url('{{ asset('assets/landing/img/sumatra/bg1.png') }}');">
        <div class="play-btn">
            <a class="video-popup" href="#tiktokEmbed">
    <i class="fa-solid fa-play"></i>
</a>

<div id="tiktokEmbed" class="mfp-hide">
    <blockquote class="tiktok-embed"
        cite="https://www.tiktok.com/@wing_s182/video/7580040386157088007"
        data-video-id="7580040386157088007">
    </blockquote>
    <script async src="https://www.tiktok.com/embed.js"></script>
</div>
        </div>
            <h3 class="text-white mt-4 text-center">Lihat Dokumentasi Penyaluran <br> Bantuan Tahap 1</h3>
        </div>
    <!-- ==============================================
         5. PILIHAN PAKET DONASI
    =============================================== -->
    <section id="pilihan-donasi" class="pricing-section section-padding fix">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Pilihan Kebaikan</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Pilih Paket Donasi <br> Sesuai Kemampuanmu
                </h2>
            </div>
            <div class="row">
                <!-- Paket 1 -->
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="pricing-card-items">
                        <div class="pricing-header">
                            <div class="post-cart">Paket Pangan</div>
                            <div class="pricing-date"><h2>Rp 50rb</h2></div>
                            <p>Menyediakan makanan siap saji dan air bersih.</p>
                        </div>
                        <ul class="pricing-list">
                            <li><i class="fa-solid fa-check"></i> Makanan Siap Saji</li>
                            <li><i class="fa-solid fa-check"></i> Air Mineral</li>
                            <li><i class="fa-solid fa-check"></i> Laporan Penyaluran</li>
                        </ul>
                        <div class="pricing-btn">
                            <a class="theme-btn" href="#">Pilih Paket Ini</a>
                        </div>
                    </div>
                </div>
                <!-- Paket 2 -->
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="pricing-card-items active-color">
                        <div class="pricing-header">
                            <div class="post-cart bg-color">Paket Medis & Bayi</div>
                            <div class="pricing-date style-2"><h2>Rp 150rb</h2></div>
                            <p>Bantuan obat-obatan, vitamin, dan popok bayi.</p>
                        </div>
                        <ul class="pricing-list style-2">
                            <li><i class="fa-solid fa-check"></i> Obat & Vitamin</li>
                            <li><i class="fa-solid fa-check"></i> Susu & Popok Bayi</li>
                            <li><i class="fa-solid fa-check"></i> Layanan Medis</li>
                            <li class="active"><i class="fa-solid fa-check"></i> Sertifikat Kebaikan</li>
                        </ul>
                        <div class="pricing-btn style-2">
                            <a class="theme-btn" href="#">Pilih Paket Ini</a>
                        </div>
                    </div>
                </div>
                <!-- Paket 3 -->
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="pricing-card-items">
                        <div class="pricing-header">
                            <div class="post-cart">Paket Hunian Darurat</div>
                            <div class="pricing-date"><h2>Rp 500rb</h2></div>
                            <p>Penyediaan tenda, selimut tebal, dan alas tidur.</p>
                        </div>
                        <ul class="pricing-list">
                            <li><i class="fa-solid fa-check"></i> Tenda & Terpal</li>
                            <li><i class="fa-solid fa-check"></i> Selimut & Alas Tidur</li>
                            <li><i class="fa-solid fa-check"></i> Prioritas Penyaluran</li>
                        </ul>
                        <div class="pricing-btn">
                            <a class="theme-btn" href="#">Pilih Paket Ini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
         6. TRANSPARANSI / SKILLS
    =============================================== -->
    <section class="feature-business-section pt-0 section-padding">
        <div class="business-wrapper style-2">
            <div class="container-fluid">
                <div class="row g-4 align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <div class="skills-content-items">
                            <div class="section-title mb-4">
                                <span class="wow fadeInUp">Transparansi</span>
                                <h2>Laporan Real-Time</h2>
                            </div>
                            <div class="circle-progress-bar-wrapper">
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".3s">
                                    <div class="circle-bar" data-percent="85" data-duration="2000"></div>
                                    <div class="content"><h4>Dana <br> Tersalurkan</h4></div>
                                </div>
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".5s">
                                    <div class="circle-bar" data-percent="90" data-duration="2000"></div>
                                    <div class="content"><h4>Logistik <br> Terkirim</h4></div>
                                </div>
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".7s">
                                    <div class="circle-bar" data-percent="100" data-duration="2000"></div>
                                    <div class="content"><h4>Area <br> Terjangkau</h4></div>
                                </div>
                            </div>
                            <p class="wow fadeInUp" data-wow-delay=".3s">
                                Kami menjamin 100% donasi bersih disalurkan langsung. Laporan keuangan dapat diakses publik setiap saat.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 ps-lg-5">
                        <div class="counter-items">
                            <div class="counter-text wow fadeInUp" data-wow-delay=".3s">
                                <h2><span class="count">24</span>/7</h2>
                                <h5>Posko Bantuan <br> Siaga</h5>
                            </div>
                            <p class="mt-3 mb-5 wow fadeInUp" data-wow-delay=".5s">
                                Tim relawan kami siaga 24 jam di lokasi bencana.
                            </p>
                            <a class="theme-btn wow fadeInUp" data-wow-delay=".3s" href="#">Lihat Laporan Detail</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </section>

    <!-- ==============================================
         7. GALANG DANA LAIN (Campaign Lainnya)
    =============================================== -->
    <section id="campaign-lain" class="project-section-2 fix">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="wow fadeInUp">Butuh Bantuan Segera</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Campaign Darurat Lainnya</h2>
                </div>
                <a class="theme-btn style-2 wow fadeInUp" data-wow-delay=".5s" href="#">Lihat Semua</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="swiper project-slider">
                <div class="swiper-wrapper">
                    <!-- Campaign 1 -->
                    <div class="swiper-slide">
                        <div class="project-card-items-2">
                            <div class="project-image">
                                <img src="{{ asset('assets/landing/img/project/01.jpg') }}" alt="img">
                                <div class="project-content">
                                    <h4><a href="#">Banjir Bandang Demak</a></h4>
                                    <span>Terkumpul: Rp 25.000.000</span>
                                    <p>Ribuan warga mengungsi, butuh selimut & makanan.</p>
                                    <a href="#" class="icon"><i class="fa-light fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Campaign 2 -->
                    <div class="swiper-slide">
                        <div class="project-card-items-2">
                            <div class="project-image">
                                <img src="{{ asset('assets/landing/img/project/02.jpg') }}" alt="img">
                                <div class="project-content">
                                    <h4><a href="#">Gempa Bumi Cianjur</a></h4>
                                    <span>Terkumpul: Rp 150.000.000</span>
                                    <p>Renovasi masjid dan sekolah yang roboh.</p>
                                    <a href="#" class="icon"><i class="fa-light fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Campaign 3 -->
                    <div class="swiper-slide">
                        <div class="project-card-items-2">
                            <div class="project-image">
                                <img src="{{ asset('assets/landing/img/project/03.jpg') }}" alt="img">
                                <div class="project-content">
                                    <h4><a href="#">Erupsi Gunung Ruang</a></h4>
                                    <span>Terkumpul: Rp 40.000.000</span>
                                    <p>Bantuan masker dan air bersih untuk warga.</p>
                                    <a href="#" class="icon"><i class="fa-light fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
         8. MARQUEE SECTION (Teks Berjalan Ringan)
         Menggunakan teks CSS, sangat ringan!
    =============================================== -->
    <div class="marquee-section fix pt-5">
        <div class="mycustom-marque">
            <div class="scrolling-wrap gap-100">
                <div class="comm">
                    <div class="cmn-textslide textitalick text-custom-storke">Mari Berbagi</div>
                    <div class="cmn-textslide textitalick text-custom-storke">Peduli Sesama</div>
                    <div class="cmn-textslide textitalick text-custom-storke">Pulihkan Harapan</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide textitalick text-custom-storke">Mari Berbagi</div>
                    <div class="cmn-textslide textitalick text-custom-storke">Peduli Sesama</div>
                    <div class="cmn-textslide textitalick text-custom-storke">Pulihkan Harapan</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide textitalick text-custom-storke">Mari Berbagi</div>
                    <div class="cmn-textslide textitalick text-custom-storke">Peduli Sesama</div>
                    <div class="cmn-textslide textitalick text-custom-storke">Pulihkan Harapan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==============================================
         9. NEWS SECTION (Kabar Lapangan)
    =============================================== -->
    <section class="news-section section-padding fix">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Kabar Lapangan</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Cerita & Update Terbaru
                </h2>
            </div>
            <div class="row">
                <!-- Berita 1 -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="news-box-items">
                        <div class="news-image wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <img src="{{ asset('assets/landing/img/news/01.jpg') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <ul class="post-list">
                                <li>Admin</li>
                                <li>Logistik</li>
                            </ul>
                            <h4><a href="#">Distribusi 1000 Paket Sembako di Desa Terisolir</a></h4>
                            <a href="#" class="link-btn mt-0">Baca Selengkapnya<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Berita 2 -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="news-box-items">
                        <div class="news-image wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.4s">
                            <img src="{{ asset('assets/landing/img/news/02.jpg') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <ul class="post-list">
                                <li>Relawan</li>
                                <li>Kisah</li>
                            </ul>
                            <h4><a href="#">Senyum Kembali Merekah di Wajah Pengungsi Anak</a></h4>
                            <a href="#" class="link-btn mt-0">Baca Selengkapnya<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Berita 3 -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="news-box-items">
                        <div class="news-image wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.6s">
                            <img src="{{ asset('assets/landing/img/news/03.jpg') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <ul class="post-list">
                                <li>Keuangan</li>
                                <li>Laporan</li>
                            </ul>
                            <h4><a href="#">Laporan Pertanggungjawaban Dana Tahap 1</a></h4>
                            <a href="#" class="link-btn mt-0">Baca Selengkapnya<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
         10. CTA FOOTER (Tombol Donasi Akhir)
    =============================================== -->
    <section class="strock-text section-padding fix pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="text-items text-center">
                        <a href="#pilihan-donasi" class="icon">
                            <i class="fa-solid fa-paper-plane"></i>
                        </a>
                        <h2 style="font-size: 4rem;">Mulai Donasi</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection 