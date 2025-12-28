<div class="hk-menu">
    <!-- Brand -->
    <div class="menu-header">
        <span>
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <img class="brand-img img-fluid" src="{{ asset('assets/admin/img/brand-sm.svg') }}" alt="brand" />
                <span class="fw-bold ms-2 text-primary">Jampack</span>
            </a>
            <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                <span class="icon">
                    <span class="svg-icon fs-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="10" y1="12" x2="20" y2="12"></line>
                            <line x1="10" y1="12" x2="14" y2="16"></line>
                            <line x1="10" y1="12" x2="14" y2="8"></line>
                            <line x1="4" y1="4" x2="4" y2="20"></line>
                        </svg>
                    </span>
                </span>
            </button>
        </span>
    </div>
    <!-- /Brand -->

    <!-- Main Menu -->
    <div data-simplebar class="nicescroll-bar">
        <div class="menu-content-wrap">
            <div class="menu-group">
                <ul class="navbar-nav flex-column">
                    
                    <!-- Dashboard -->
                    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-template" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="4" rx="1" />
                                        <rect x="4" y="12" width="6" height="8" rx="1" />
                                        <line x1="14" y1="12" x2="20" y2="12" />
                                        <line x1="14" y1="16" x2="20" y2="16" />
                                        <line x1="14" y1="20" x2="20" y2="20" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    <!-- Separator & Label -->
                    <li class="nav-item mt-3 mb-1 text-muted text-uppercase small px-3 fw-bold">Master Data</li>

                    <!-- Donasi Masuk -->
                    <li class="nav-item {{ request()->routeIs('admin.donasi.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.donasi.index') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="7" y="9" width="14" height="10" rx="2" />
                                        <circle cx="14" cy="14" r="2" />
                                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Donasi Masuk</span>
                        </a>
                    </li>

                    <!-- Data Donatur -->
                    <li class="nav-item {{ request()->routeIs('admin.donatur.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.donatur.index') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Data Donatur</span>
                        </a>
                    </li>

                    <!-- Separator & Label -->
                    <li class="nav-item mt-3 mb-1 text-muted text-uppercase small px-3 fw-bold">Konten</li>

                    <!-- Campaign -->
                    <li class="nav-item {{ request()->routeIs('admin.campaign.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.campaign.index') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Campaign</span>
                        </a>
                    </li>

                    <!-- Kabar Lapangan -->
                    <li class="nav-item {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.posts.index') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-news" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                                        <line x1="8" y1="8" x2="12" y2="8" />
                                        <line x1="8" y1="12" x2="12" y2="12" />
                                        <line x1="8" y1="16" x2="12" y2="16" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Kabar Lapangan</span>
                        </a>
                    </li>

                    <!-- Separator & Label -->
                    <li class="nav-item mt-3 mb-1 text-muted text-uppercase small px-3 fw-bold">Pengaturan</li>

                    <!-- Lihat Website (Fixed) -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}" target="_blank">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Lihat Website</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>