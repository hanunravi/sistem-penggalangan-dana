<!-- Header Area Start -->
<header class="header-area">
    <div class="container-fluid">
        <!-- Wrapper utama -->
        <div class="header-main-wrapper py-3">
            
            <!-- Flex container -->
            <div class="d-flex align-items-center justify-content-between">
                
                <!-- 1. LOGO -->
                <div class="header-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/landing/img/logo/black-logo.png') }}" alt="logo-img">
                    </a>
                </div>

                <!-- 2. AREA TOMBOL -->
                <div class="header-right d-flex align-items-center">
                    
                    <!-- Tombol Admin (PERBAIKAN DI SINI) -->
                    <!-- Arahkan ke route 'admin.login' agar tidak error redirect -->
                    <div class="header-button d-none d-sm-block me-3">
                        <a href="{{ route('admin.login') }}" class="theme-btn style-2">
                            Admin
                        </a>
                    </div>

                    <!-- Tombol Mulai Donasi -->
                    <div class="header-button d-none d-sm-block">
                        <a href="{{ url('/donasi-manual') }}" class="theme-btn">
                            Mulai Donasi
                        </a>
                    </div>

                    <!-- Tombol Mobile -->
                    <div class="header-bar d-lg-none ms-3">
                        <span class="sidebar-toggle-btn">
                            <i class="fas fa-bars"></i>
                        </span>
                    </div>

                </div>

            </div>
        </div>
    </div>
</header>