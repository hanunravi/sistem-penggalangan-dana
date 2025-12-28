<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Jampack - Admin Dashboard')</title>
<meta name="description" content="Dashboard Admin Yayasan Peduli Sesama"/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

<!-- Daterangepicker CSS -->
<link href="{{ asset('assets/admin/vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

<!-- Data Table CSS -->
<link href="{{ asset('assets/admin/vendors/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/vendors/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

<!-- CSS Utama Jampack -->
<link href="{{ asset('assets/admin/dist/css/style.css') }}" rel="stylesheet" type="text/css">

<!-- FontAwesome (Tambahan) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@stack('styles')