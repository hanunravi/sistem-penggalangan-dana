@extends('layouts.front')

@section('content')

    <!-- ==============================================
         1. HERO SECTION (Banner Utama)
    =============================================== -->
    <section class="hero-section hero-3">
        <div class="hero-shape"><img src="{{ asset('assets/landing/img/hero/love-shape.png') }}" alt="shape"></div>
        <div class="hero-shape-2"><img src="{{ asset('assets/landing/img/hero/shap.png') }}" alt="shape"></div>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">Uluran Tanganmu <br> Harapan Bagi Mereka.</h1>
                        <p class="wow fadeInUp" data-wow-delay=".5s">Ribuan saudara kita terdampak bencana. Mari bersatu berikan bantuan logistik, medis, dan hunian darurat.</p>
                        <div class="mt-4 wow fadeInUp" data-wow-delay=".6s">
                            {{-- Link ke Halaman Manual --}}
                            <a href="{{ url('/donasi-manual') }}" class="theme-btn border-0">Donasi Sekarang</a>
                            <a href="#campaign-lain" class="theme-btn style-2 ms-3">Lihat Campaign Lain</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="swiper hero-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><div class="hero-image"><img src="{{ asset('assets/landing/img/sumatra/4.jpg') }}" alt="Banjir"></div></div>
                            <div class="swiper-slide"><div class="hero-image"><img src="{{ asset('assets/landing/img/sumatra/7.jpg') }}" alt="Gempa"></div></div>
                            <div class="swiper-slide"><div class="hero-image"><img src="{{ asset('assets/landing/img/sumatra/1.jpg') }}" alt="Erupsi"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
         2. KATEGORI DONASI (Grid Tampilan Tabel)
         Link sudah disesuaikan agar otomatis memilih kategori di form
    =============================================== -->
    <section class="category-section section-padding pt-5 pb-5">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span class="wow fadeInUp text-primary fw-bold" style="letter-spacing: 2px;">PILIHAN DONASI</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Salurkan Kebaikan</h2>
            </div>
            
            <div class="row g-4 justify-content-center">
                {{-- Item 1: Medis --}}
                <div class="col-lg-3 col-md-4 col-6 wow fadeInUp" data-wow-delay=".2s">
                    <a href="{{ url('/donasi-manual?kategori=medis') }}" class="category-link">
                        <div class="category-box">
                            <div class="icon-wrapper bg-danger-soft"><i class="fas fa-heartbeat fa-2x text-danger"></i></div>
                            <h5 class="mt-3">Medis & Kesehatan</h5>
                        </div>
                    </a>
                </div>
                {{-- Item 2: Pendidikan --}}
                <div class="col-lg-3 col-md-4 col-6 wow fadeInUp" data-wow-delay=".3s">
                    <a href="{{ url('/donasi-manual?kategori=pendidikan') }}" class="category-link">
                        <div class="category-box">
                            <div class="icon-wrapper bg-primary-soft"><i class="fas fa-graduation-cap fa-2x text-primary"></i></div>
                            <h5 class="mt-3">Pendidikan</h5>
                        </div>
                    </a>
                </div>
                {{-- Item 3: Bencana --}}
                <div class="col-lg-3 col-md-4 col-6 wow fadeInUp" data-wow-delay=".4s">
                    <a href="{{ url('/donasi-manual?kategori=bencana_alam') }}" class="category-link">
                        <div class="category-box">
                            <div class="icon-wrapper bg-warning-soft"><i class="fas fa-house-damage fa-2x text-warning"></i></div>
                            <h5 class="mt-3">Bencana Alam</h5>
                        </div>
                    </a>
                </div>
                {{-- Item 4: Rumah Ibadah --}}
                <div class="col-lg-3 col-md-4 col-6 wow fadeInUp" data-wow-delay=".5s">
                    <a href="{{ url('/donasi-manual?kategori=infrastruktur') }}" class="category-link">
                        <div class="category-box">
                            <div class="icon-wrapper bg-success-soft"><i class="fas fa-mosque fa-2x text-success"></i></div>
                            <h5 class="mt-3">Rumah Ibadah</h5>
                        </div>
                    </a>
                </div>
                {{-- Item 5: Satwa --}}
                <div class="col-lg-3 col-md-4 col-6 wow fadeInUp" data-wow-delay=".6s">
                    <a href="{{ url('/donasi-manual?kategori=satwa') }}" class="category-link">
                        <div class="category-box">
                            <div class="icon-wrapper bg-secondary-soft"><i class="fas fa-paw fa-2x text-secondary"></i></div>
                            <h5 class="mt-3">Dunia Satwa</h5>
                        </div>
                    </a>
                </div>
                {{-- Item 6: Lingkungan --}}
                <div class="col-lg-3 col-md-4 col-6 wow fadeInUp" data-wow-delay=".7s">
                    <a href="{{ url('/donasi-manual?kategori=lingkungan') }}" class="category-link">
                        <div class="category-box">
                            <div class="icon-wrapper bg-success-soft"><i class="fas fa-tree fa-2x text-success"></i></div>
                            <h5 class="mt-3">Lingkungan</h5>
                        </div>
                    </a>
                </div>
                {{-- Item 7: Pangan --}}
                <div class="col-lg-3 col-md-4 col-6 wow fadeInUp" data-wow-delay=".8s">
                    <a href="{{ url('/donasi-manual?kategori=pangan_gizi') }}" class="category-link">
                        <div class="category-box">
                            <div class="icon-wrapper bg-warning-soft"><i class="fas fa-utensils fa-2x text-warning"></i></div>
                            <h5 class="mt-3">Berbagi Makanan</h5>
                        </div>
                    </a>
                </div>
                {{-- Item 8: Lainnya --}}
                <div class="col-lg-3 col-md-4 col-6 wow fadeInUp" data-wow-delay=".9s">
                    <a href="{{ url('/donasi-manual?kategori=lainnya') }}" class="category-link">
                        <div class="category-box">
                            <div class="icon-wrapper bg-info-soft"><i class="fas fa-th-large fa-2x text-info"></i></div>
                            <h5 class="mt-3">Lainnya</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

   {{-- ==============================================
         3. STATISTIK HERO (Yang kotak-kotak icon)
         (Update agar angkanya dinamis juga)
    =============================================== --}}
    <section class="funfact-section section-padding fix header-bg">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="text-white wow fadeInUp">Update Terkini</h2>
        </div>
        <div class="row">
            {{-- Item 1: Total Uang --}}
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="funfact-items">
                    <div class="icon"><img src="{{ asset('assets/landing/img/icon/05.svg') }}" alt="icon"></div>
                    <div class="content">
                        {{-- PERBAIKAN: Gunakan format angka standar (titik untuk desimal, tanpa ribuan) agar animasi JS lancar --}}
                        @if($totalUang >= 1000000)
                            {{-- Contoh output: 1.5 (Jt) --}}
                            <h2>Rp <span class="count">{{ number_format($totalUang / 1000000, 1, '.', '') }}</span>Jt</h2>
                        @else
                            {{-- Contoh output: 500000 (Tanpa titik ribuan di dalam span count) --}}
                            <h2>Rp <span class="count">{{ $totalUang }}</span></h2>
                        @endif
                        <p>Dana Terkumpul</p>
                    </div>
                </div>
            </div>

            {{-- Item 2: Total Donatur --}}
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="funfact-items">
                    <div class="icon"><img src="{{ asset('assets/landing/img/icon/06.svg') }}" alt="icon"></div>
                    <div class="content">
                        {{-- PERBAIKAN: Hapus number_format agar jadi angka murni --}}
                        <h2><span class="count">{{ $totalDonatur }}</span>+</h2>
                        <p>Orang Baik</p>
                    </div>
                </div>
            </div>

            {{-- Item 3: Program Aktif --}}
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                <div class="funfact-items">
                    <div class="icon"><img src="{{ asset('assets/landing/img/icon/07.svg') }}" alt="icon"></div>
                    <div class="content">
                        <h2><span class="count">{{ $campaigns->count() }}</span></h2>
                        <p>Program Kebaikan</p>
                    </div>
                </div>
            </div>

            {{-- Item 4: Aksi Kebaikan --}}
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                <div class="funfact-items">
                    <div class="icon"><img src="{{ asset('assets/landing/img/icon/08.svg') }}" alt="icon"></div>
                    <div class="content">
                        <h2><span class="count">{{ $totalDonatur }}</span>+</h2>
                        <p>Aksi Kebaikan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- ==============================================
         4. DONATUR TERBARU (Data Real dari DB)
    =============================================== --}}
    <section class="choose-us-section section-padding fix">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Terima Kasih</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Donatur Terbaru</h2>
                <p>Doa dan dukungan dari para orang baik yang baru saja berdonasi.</p>
            </div>
            
            <div class="row g-4 justify-content-center">
                
                {{-- LOOPING DATA DARI DATABASE --}}
                @forelse($donaturTerbaru as $donasi)
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="choose-us-items">
                            <div class="icon">
                                <i class="fas fa-user-circle fa-3x text-primary"></i>
                            </div>
                            <div class="content">
                                {{-- Nama Donatur (Jika kosong tampilkan Hamba Allah) --}}
                                <h4>{{ $donasi->donatur_name ?? 'Hamba Allah' }}</h4>
                                
                                {{-- Nominal --}}
                                <h5 class="text-success">Rp {{ number_format($donasi->amount, 0, ',', '.') }}</h5>
                                
                                {{-- Pesan & Waktu --}}
                                <p>
                                    "{{ Str::limit($donasi->message ?? 'Semoga berkah', 50) }}" <br>
                                    {{-- Menggunakan Carbon untuk waktu '5 menit lalu' --}}
                                    <small class="text-muted">- {{ \Carbon\Carbon::parse($donasi->created_at)->diffForHumans() }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- TAMPILAN JIKA BELUM ADA DATA --}}
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada donasi terbaru. Jadilah yang pertama!</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    {{-- ==============================================
         5. VIDEO TIKTOK
    =============================================== --}}
    <div class="vedio-area fix bg-cover" style="background-image: url('{{ asset('assets/landing/img/sumatra/bg1.png') }}');">
        <div class="play-btn">
            <a class="tiktok-trigger video-btn style-2 ripple" href="#tiktok-modal"><i class="fa-solid fa-play"></i></a>
            <h3 class="text-white mt-4 text-center">Lihat Dokumentasi Penyaluran</h3>
        </div>
    </div>
    
    <div id="tiktok-modal" class="mfp-hide white-popup-block">
        <div class="tiktok-container">
            <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@wing_s182/video/7580040386157088007" data-video-id="7580040386157088007" style="max-width: 605px;min-width: 325px;"> 
                <section> <a target="_blank" href="https://www.tiktok.com/@wing_s182?refer=embed">@wing_s182</a> </section> 
            </blockquote> 
        </div>
    </div>

  <!-- ==============================================
         6. PAKET DONASI (5 Kategori Pilihan)
         Sudah terintegrasi otomatis dengan halaman donasi-paket
    =============================================== -->
    <section class="pricing-section section-padding">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-content wow fadeInUp">Pilihan Kebaikan</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">Paket Donasi Pilihan</h2>
        </div>
        
        <div class="row">
            
            {{-- 1. PAKET SEMBAKO / PANGAN (Rp 150.000) --}}
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="pricing-card-items">
                    <div class="pricing-header">
                        <div class="post-cart">Paket Kenyang</div>
                        <div class="pricing-date"><h2>Rp 150rb</h2></div>
                        <p>Berbagi nasi kotak & sembako untuk dhuafa.</p>
                    </div>
                    <ul class="pricing-list">
                        <li><i class="fas fa-utensils text-primary"></i> Nasi Kotak Jumat</li>
                        <li><i class="fas fa-box text-primary"></i> Sembako Bulanan</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Penyaluran Tepat Sasaran</li>
                    </ul>
                    <div class="pricing-btn">
                        {{-- Link ke PANGAN --}}
                        <a href="{{ url('/donasi-paket?nama=Paket Kenyang Sembako&harga=150000&kategori=pangan_gizi') }}" class="theme-btn border-0 w-100">
                            Pilih Paket Ini
                        </a>
                    </div>
                </div>
            </div>

            {{-- 2. PAKET SEHAT / MEDIS (Rp 100.000) --}}
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="pricing-card-items active-color">
                    <div class="pricing-header">
                        <div class="post-cart bg-color">Paket Sehat</div>
                        <div class="pricing-date style-2"><h2>Rp 100rb</h2></div>
                        <p>Bantuan medis untuk pasien kurang mampu.</p>
                    </div>
                    <ul class="pricing-list style-2">
                        <li><i class="fas fa-pills text-white"></i> Obat & Vitamin</li>
                        <li><i class="fas fa-user-md text-white"></i> Biaya Rawat Jalan</li>
                        <li><i class="fas fa-check-circle text-white"></i> Pendampingan Pasien</li>
                    </ul>
                    <div class="pricing-btn style-2">
                        {{-- Link ke MEDIS --}}
                        <a href="{{ url('/donasi-paket?nama=Paket Sehat Medis&harga=100000&kategori=medis') }}" class="theme-btn border-0 w-100">
                            Pilih Paket Ini
                        </a>
                    </div>
                </div>
            </div>

            {{-- 3. PAKET CERDAS / PENDIDIKAN (Rp 150.000) --}}
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="pricing-card-items">
                    <div class="pricing-header">
                        <div class="post-cart">Paket Cerdas</div>
                        <div class="pricing-date"><h2>Rp 150rb</h2></div>
                        <p>Dukungan pendidikan anak yatim & dhuafa.</p>
                    </div>
                    <ul class="pricing-list">
                        <li><i class="fas fa-book text-primary"></i> Alat Tulis & Buku</li>
                        <li><i class="fas fa-tshirt text-primary"></i> Seragam Sekolah</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Beasiswa Bulanan</li>
                    </ul>
                    <div class="pricing-btn">
                        {{-- Link ke PENDIDIKAN --}}
                        <a href="{{ url('/donasi-paket?nama=Paket Pendidikan Cerdas&harga=150000&kategori=pendidikan') }}" class="theme-btn border-0 w-100">
                            Pilih Paket Ini
                        </a>
                    </div>
                </div>
            </div>

            {{-- 4. PAKET TANGGAP / BENCANA (Rp 200.000) --}}
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="pricing-card-items">
                    <div class="pricing-header">
                        <div class="post-cart">Paket Tanggap</div>
                        <div class="pricing-date"><h2>Rp 200rb</h2></div>
                        <p>Logistik darurat untuk korban bencana alam.</p>
                    </div>
                    <ul class="pricing-list">
                        <li><i class="fas fa-campground text-primary"></i> Tenda & Selimut</li>
                        <li><i class="fas fa-first-aid text-primary"></i> P3K & Makanan Bayi</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Dapur Umum</li>
                    </ul>
                    <div class="pricing-btn">
                        {{-- Link ke BENCANA --}}
                        <a href="{{ url('/donasi-paket?nama=Paket Tanggap Bencana&harga=200000&kategori=bencana_alam') }}" class="theme-btn border-0 w-100">
                            Pilih Paket Ini
                        </a>
                    </div>
                </div>
            </div>

            {{-- 5. PAKET LESTARI / LINGKUNGAN (Rp 75.000) --}}
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                <div class="pricing-card-items">
                    <div class="pricing-header">
                        <div class="post-cart">Paket Lestari</div>
                        <div class="pricing-date"><h2>Rp 75rb</h2></div>
                        <p>Menjaga bumi dan menyayangi satwa.</p>
                    </div>
                    <ul class="pricing-list">
                        <li><i class="fas fa-tree text-primary"></i> 5 Bibit Pohon</li>
                        <li><i class="fas fa-paw text-primary"></i> Pakan Kucing Jalanan</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Aksi Bersih Sampah</li>
                    </ul>
                    <div class="pricing-btn">
                        {{-- Link ke LINGKUNGAN --}}
                        <a href="{{ url('/donasi-paket?nama=Paket Lestari Lingkungan&harga=75000&kategori=lingkungan') }}" class="theme-btn border-0 w-100">
                            Pilih Paket Ini
                        </a>
                    </div>
                </div>
            </div>


            {{-- 6. PAKET MASJID / INFRASTRUKTUR (Rp 300.000) --}}
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                <div class="pricing-card-items">
                    <div class="pricing-header">
                        <div class="post-cart">Paket Ibadah</div>
                        <div class="pricing-date"><h2>Rp 300rb</h2></div>
                        <p>Renovasi dan pemeliharaan rumah ibadah.</p>
                    </div>
                    <ul class="pricing-list">
                        <li><i class="fas fa-mosque text-primary"></i> Perbaikan Bangunan</li>
                        <li><i class="fas fa-hammer text-primary"></i> Material Konstruksi</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Perawatan Fasilitas</li>
                    </ul>
                    <div class="pricing-btn">
                        {{-- Link ke INFRASTRUKTUR --}}
                        <a href="{{ url('/donasi-paket?nama=Paket Masjid Infrastruktur&harga=300000&kategori=infrastruktur') }}" class="theme-btn border-0 w-100">
                            Pilih Paket Ini
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    {{-- ==============================================
         7. TRANSPARANSI / STATISTIK (Dynamic Data)
    =============================================== --}}
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
                                {{-- Progress Bar 1: Dana Terkumpul --}}
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".3s">
                                    {{-- Persentase dummy (bisa dihitung logic jika ada target) --}}
                                    <div class="circle-bar" data-percent="85" data-duration="2000"></div>
                                    <div class="content">
                                        <h4>Dana <br> Terkumpul</h4>
                                        {{-- Tampilkan Total Uang --}}
                                        <span class="text-primary fw-bold">Rp {{ number_format($totalUang, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                
                                {{-- Progress Bar 2: Total Donatur --}}
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".5s">
                                    <div class="circle-bar" data-percent="90" data-duration="2000"></div>
                                    <div class="content">
                                        <h4>Orang <br> Baik</h4>
                                        <span class="text-primary fw-bold">{{ number_format($totalDonatur) }} Orang</span>
                                    </div>
                                </div>
                            </div>
                            <p class="wow fadeInUp" data-wow-delay=".3s">
                                Kami menjamin 100% donasi bersih disalurkan langsung. Laporan keuangan dapat diakses publik setiap saat.
                            </p>
                        </div>
                    </div>
                    
                    {{-- Counter Statistik Kanan --}}
                    <div class="col-xl-5 col-lg-6 ps-lg-5">
                        <div class="counter-items">
                            <div class="counter-text wow fadeInUp" data-wow-delay=".3s">
                                <h2><span class="count">{{ $totalDonatur }}</span>+</h2>
                                <h5>Donasi <br> Masuk</h5>
                            </div>
                            <p class="mt-3 mb-5 wow fadeInUp" data-wow-delay=".5s">
                                Terima kasih kepada ribuan orang baik yang telah percaya menyalurkan bantuannya melalui kami.
                            </p>
                            <a class="theme-btn wow fadeInUp" data-wow-delay=".3s" href="#">Lihat Laporan Detail</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </section>

    {{-- 8. CAMPAIGN LAINNYA --}}
    <section id="campaign-lain" class="project-section-2 fix">
        <div class="container"><div class="section-title-area"><div class="section-title"><span class="wow fadeInUp">Campaign Lainnya</span><h2 class="wow fadeInUp">Butuh Bantuan Segera</h2></div><a class="theme-btn style-2 wow fadeInUp" href="#">Lihat Semua</a></div></div>
        <div class="container-fluid">
            <div class="swiper project-slider">
                <div class="swiper-wrapper">
                    @forelse($campaigns as $cp)
                    <div class="swiper-slide">
                        <div class="project-card-items-2">
                            <div class="project-image" style="position: relative;">
                                {{-- Gambar --}}
                                <img src="{{ asset('storage/' . $cp->image) }}" alt="{{ $cp->title }}" style="height: 350px; width: 100%; object-fit: cover;">
                                
                                {{-- Overlay Content --}}
                                <div class="project-content" style="position: absolute; bottom: 20px; left: 20px; right: 20px; z-index: 99;">
                                    
                                    {{-- Judul (Diberi z-index tinggi biar bisa diklik) --}}
                                    <h4 style="position: relative; z-index: 100;">
                                        <a href="{{ route('campaign.show', $cp->id) }}" class="text-white stretched-link">
                                            {{ $cp->title }}
                                        </a>
                                    </h4>
                                    
                                    {{-- Tombol Panah --}}
                                    <a href="{{ route('campaign.show', $cp->id) }}" class="icon" style="position: relative; z-index: 101;">
                                        <i class="fa-light fa-arrow-right-long"></i>
                                    </a>
                                </div>
                                
                                {{-- Opsional: Link Pembungkus Transparan (Agar seluruh kotak bisa diklik) --}}
                                <a href="{{ route('campaign.show', $cp->id) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 50;"></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p>Belum ada campaign aktif saat ini.</p>
                    </div>
                    @endforelse
                    </div>
                </div>
        </div>
    </section>

    {{-- 9. MARQUEE --}}
    <div class="marquee-section fix pt-5">
        <div class="mycustom-marque">
            <div class="scrolling-wrap gap-100">
                <div class="comm">
                    <div class="cmn-textslide textitalick text-custom-storke">Mari Berbagi</div>
                    <div class="cmn-textslide textitalick text-custom-storke">Peduli Sesama</div>
                    <div class="cmn-textslide textitalick text-custom-storke">Pulihkan Harapan</div>
                </div>
            </div>
        </div>
    </div>

    {{-- 10. NEWS --}}
    <section class="news-section section-padding fix">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Kabar Lapangan</span>
                <h2 class="wow fadeInUp">Update Terbaru</h2>
            </div>
            
            <div class="row">
                {{-- Mulai Loop Data Post --}}
                @forelse($posts as $post)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="news-box-items">
                        <div class="news-image">
                            {{-- Gambar Dinamis --}}
                            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" style="height: 250px; object-fit: cover; width: 100%;">
                        </div>
                        <div class="news-content">
                            {{-- Judul Dinamis dengan Link ke Detail --}}
                            <h4>
                                <a href="{{ route('kabar.show', $post->slug) }}">
                                    {{ Str::limit($post->title, 40) }}
                                </a>
                            </h4>
                            
                            {{-- Tombol Baca --}}
                            <a href="{{ route('kabar.show', $post->slug) }}" class="link-btn">Baca</a>
                        </div>
                    </div>
                </div>
                @empty
                {{-- Tampilan Jika Belum Ada Berita --}}
                <div class="col-12 text-center">
                    <p>Belum ada kabar terbaru saat ini.</p>
                </div>
                @endforelse
                {{-- Selesai Loop --}}
            </div>
        </div>
    </section>

    {{-- 11. FOOTER CTA --}}
    <section class="strock-text section-padding fix pt-0">
        <div class="container"><div class="row"><div class="col-xl-12 text-center"><div class="text-items" style="padding: 30px 0;"><a href="{{ url('/donasi-manual') }}" ></a><h2 style="font-size: 2rem; margin: 15px 0;">Mulai Donasi</h2></div></div></div></div>
    </section>

@endsection

{{-- Include Script & CSS Eksternal (Agar Home Bersih) --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/landing/css/home-custom.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/landing/js/home-custom.js') }}"></script>
@endpush