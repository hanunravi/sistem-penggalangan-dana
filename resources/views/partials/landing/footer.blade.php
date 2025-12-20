<footer class="footer-section fix bg-cover" style="background-image: url('assets/landing/img/Footer-bg.jpg');">
    <div class="container">
        <div class="footer-widget-wrapper">
            <div class="row">
                {{-- Kolom 1: Logo & Deskripsi --}}
                <div class="col-xl-5 col-sm-6 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/landing/img/logo/white-logo.png') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="footer-content">
                            <p>
                                Kami memahami tantangan bisnis di era modern. 
                                Tim kami berdedikasi untuk memberikan analisis akurat 
                                dan solusi strategis demi kemajuan usaha Anda 
                                di Jawa Tengah dan sekitarnya.
                            </p>
                        </div>
                        <ul class="social-icon">
                            <li>
                                <a href="#">Facebook</a>
                            </li>
                            <li>
                                <a href="#">Twitter</a>
                            </li>
                            <li>
                                <a href="#">LinkedIn</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Kolom 2: Tautan Cepat --}}
                <div class="col-xl-2 col-sm-6 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4>Tautan Cepat</h4>
                        </div>
                        <ul class="list-items">
                            <li>
                                <a href="about.html">Tentang Kami</a>
                            </li>
                            <li>
                                <a href="service-details.html">Tim Manajemen</a>
                            </li>
                            <li>
                                <a href="service-details.html">Layanan Kami</a>
                            </li>
                            <li>
                                <a href="service-details.html">Karir</a>
                            </li>
                            <li>
                                <a href="service-details.html">Portofolio</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Kolom 3: Informasi Kontak (Semarang) --}}
                <div class="col-xl-5 col-sm-6 col-md-6 col-lg-4 ps-lg-5 wow fadeInUp" data-wow-delay=".7s">
                    <div class="single-footer-widget">
                        <div class="company-info">
                            <h4>Hubungi Kami</h4>

                            <div class="content">
                                <!-- //<span>Alamat Kantor:</span> -->
                                <h6>
                                    Jl. Pemuda No. 150, Sekayu, <br>
                                    Semarang Tengah, Kota Semarang, <br>
                                    Jawa Tengah 50132
                                </h6>
                            </div>
                            <div class="content">
                                <span>Email:</span>
                                <h6>
                                    <a href="mailto:info@perusahaansemarang.com">info@perusahaansemarang.com</a>
                                </h6>
                            </div>
                            <div class="content">
                                <span>Telepon:</span>
                                <h6>
                                    <a href="tel:02412345678">(024) 845 6789</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Copyright --}}
        <div class="footer-bottom style-2 wow fadeInUp" data-wow-delay=".3s">
            <p>
                <a href="{{ url('/') }}">Hak Cipta © 2025 oleh <span>Bizly Semarang.</span> Dilindungi Undang-Undang.</a>
            </p>
        </div>
    </div>
</footer>