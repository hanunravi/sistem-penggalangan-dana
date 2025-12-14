<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- CSS Bawaan Template (Pastikan path ini benar di public kamu) -->
    <!-- Jika belum ada, gunakan CDN Bootstrap sementara agar tidak hancur -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- CSS Custom untuk Memperbaiki Layout jika CSS Template Gagal Load -->
    <style>
        body { background-color: #f4f5f7; font-family: sans-serif; }
        
        /* Layout Fix */
        .hk-wrapper { display: flex; flex-direction: column; min-height: 100vh; }
        
        /* Navbar Fix */
        .hk-navbar {
            height: 65px;
            background: #fff;
            border-bottom: 1px solid #e0e0e0;
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1030;
            padding: 0 20px;
            display: flex;
            align-items: center;
        }

        /* Sidebar Fix */
        .hk-menu {
            width: 260px;
            background: #fff;
            position: fixed;
            top: 65px; bottom: 0; left: 0;
            border-right: 1px solid #e0e0e0;
            overflow-y: auto;
            z-index: 1020;
            padding-top: 20px;
        }

        /* Content Fix */
        .hk-pg-wrapper {
            margin-left: 260px;
            margin-top: 65px;
            padding: 30px;
            width: calc(100% - 260px);
            min-height: calc(100vh - 65px);
        }

        /* Link Sidebar */
        .nav-link { 
            display: flex; align-items: center; padding: 12px 20px; 
            color: #555; text-decoration: none; font-weight: 500; 
        }
        .nav-link:hover, .nav-link.active { color: #007bff; background: #f0f8ff; }
        .nav-icon-wrap { margin-right: 10px; }
        
        /* Responsive Mobile */
        @media (max-width: 991px) {
            .hk-menu { display: none; } /* Sembunyikan sidebar di mobile dulu */
            .hk-pg-wrapper { margin-left: 0; width: 100%; }
        }
    </style>
</head>

<body>
    
    <!-- Wrapper Utama (Wajib ada class hk-wrapper) -->
    <div class="hk-wrapper" data-layout="vertical" data-layout-style="default" data-menu="light" data-footer="simple">

        {{-- 1. NAVBAR (Header Atas) --}}
        @include('partials.admin.navbar')

        {{-- 2. SIDEBAR (Menu Kiri) --}}
        @include('partials.admin.sidebar')

        {{-- 3. KONTEN (Area Kanan) --}}
        <div class="hk-pg-wrapper">
            @yield('content')
            
            <!-- Footer -->
            <div class="hk-footer border-top pt-3 mt-5">
                <div class="container-xxl footer-wrap">
                    <p class="footer-text text-muted text-center">&copy; {{ date('Y') }} Admin Panel Donasi.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Script Wajib -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>feather.replace()</script>
</body>
</html>