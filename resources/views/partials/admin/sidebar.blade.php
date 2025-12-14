<div class="hk-menu">
    <!-- Menu Content -->
    <div data-simplebar class="nicescroll-bar">
        <div class="menu-content-wrap">
            <div class="menu-group">
                <ul class="navbar-nav flex-column">
                    
                    <!-- Dashboard -->
                    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <span class="nav-icon-wrap"><i data-feather="home"></i></span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3 mb-1 text-muted text-uppercase small px-3 fw-bold">Master Data</li>

                    <!-- Data Donasi -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon-wrap"><i data-feather="dollar-sign"></i></span>
                            <span class="nav-link-text">Donasi Masuk</span>
                        </a>
                    </li>

                    <!-- Data Donatur -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon-wrap"><i data-feather="users"></i></span>
                            <span class="nav-link-text">Data Donatur</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3 mb-1 text-muted text-uppercase small px-3 fw-bold">Pengaturan</li>

                    <!-- Lihat Website -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}" target="_blank">
                            <span class="nav-icon-wrap"><i data-feather="external-link"></i></span>
                            <span class="nav-link-text">Lihat Website</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>