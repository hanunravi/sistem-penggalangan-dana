<header class="header-area">
    <div class="container-fluid">
        <div class="header-main-wrapper">
            <div class="row align-items-center">
                
                <div class="col-xl-2 col-lg-2 col-md-4 col-6">
                    <div class="header-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/landing/img/logo/black-logo.png') }}" alt="logo-img">
                        </a>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-10 col-md-8 col-6">
                    <div class="header-menu-wrapper d-flex align-items-center justify-content-end">
                        
                        <div class="main-menu d-none d-lg-block">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="{{ url('/') }}">Beranda</a></li>
                                    <li><a href="#">Cara Kerja</a></li>
                                    <li><a href="#">Campaign</a></li>
                                    <li><a href="#">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-right d-flex align-items-center">
                            <div class="header-button d-none d-sm-block">
                                <a href="#" class="theme-btn">Mulai Donasi</a>
                            </div>
                            <div class="header-bar d-lg-none">
                                <span class="sidebar-toggle-btn">
                                    <i class="fas fa-bars"></i>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</header>