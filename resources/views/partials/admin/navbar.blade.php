<nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
    <div class="container-fluid">
        
        <!-- Bagian Kiri: Logo & Toggle -->
        <div class="nav-start-wrap d-flex align-items-center">
            <!-- Mobile Toggle -->
            <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none me-2">
                <span class="icon"><i data-feather="menu"></i></span>
            </button>

            <!-- Logo Text -->
            <a class="navbar-brand fw-bold text-primary fs-4" href="{{ route('admin.dashboard') }}">
                PEDULI ADMIN
            </a>
        </div>

        <!-- Bagian Kanan: Profil -->
        <div class="nav-end-wrap ms-auto">
            <ul class="navbar-nav flex-row">
                <!-- Profil Admin -->
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-caret text-decoration-none text-dark" href="#" data-bs-toggle="dropdown">
                            <div class="media d-flex align-items-center">
                                <div class="media-head me-2">
                                    <div class="avatar avatar-xs avatar-rounded bg-primary text-white d-flex align-items-center justify-content-center" style="width:35px; height:35px; border-radius:50%">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="fw-bold">Super Admin</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#"><i data-feather="user" class="me-2"></i>Profile</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i data-feather="log-out" class="me-2"></i>Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>