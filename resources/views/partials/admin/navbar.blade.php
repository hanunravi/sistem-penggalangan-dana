<nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
    <div class="container-fluid">
        
        <!-- Start Nav -->
        <div class="nav-start-wrap">
            <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none">
                <span class="icon">
                    <span class="feather-icon"><i data-feather="align-left"></i></span>
                </span>
            </button>
            
            <!-- Search Bar (Aktif) -->
            <form action="{{ route('admin.search') }}" method="GET" class="d-inline-block">
                <div class="input-group w-300p ms-3">
                    <span class="input-affix-wrapper input-search affix-border">
                        <input type="text" name="q" class="form-control bg-transparent" placeholder="Cari donasi, campaign..." aria-label="Search" value="{{ request('q') }}">
                        <span class="input-suffix">
                            {{-- Icon search diklik untuk submit --}}
                            <button type="submit" class="btn btn-link p-0 text-muted">
                                <span class="feather-icon"><i data-feather="search"></i></span>
                            </button>
                        </span>
                    </span>
                </div>
            </form>
        </div>
        <!-- /Start Nav -->
        
        <!-- End Nav (User Profile) -->
        <div class="nav-end-wrap">
            <ul class="navbar-nav flex-row">
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-xs avatar-rounded">
                                    <img src="{{ asset('dist/img/avatar1.jpg') }}" alt="user" class="avatar-img" 
                                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=0D8ABC&color=fff'">
                                </div>
                            </div>
                            <div class="media-body">
                                <span class="d-block fw-medium fs-7">{{ Auth::user()->name ?? 'Administrator' }} <i class="zmdi zmdi-chevron-down fs-8 ms-1"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <div class="p-2">
                            <div class="media">
                                <div class="media-head me-2">
                                    <div class="avatar avatar-primary avatar-xs avatar-rounded">
                                        <span class="initial-wrap fs-6">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="dropdown-item-title fw-bold fs-7">{{ Auth::user()->name ?? 'Administrator' }}</div>
                                    <div class="dropdown-item-subtitle fs-8 text-muted">{{ Auth::user()->email ?? 'admin@peduli.com' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item fs-7" href="#"><i class="dropdown-icon feather-icon" data-feather="user"></i><span>Profile</span></a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('admin.logout') }}" method="POST" id="logoutFormTop">
                            @csrf
                            <a class="dropdown-item text-danger fs-7" href="#" onclick="event.preventDefault(); document.getElementById('logoutFormTop').submit();">
                                <i class="dropdown-icon feather-icon" data-feather="log-out"></i><span>Logout</span>
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /End Nav -->
        
    </div>                      
</nav>