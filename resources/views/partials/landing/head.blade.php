<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Valorwide">
    <meta name="description" content="Platform Penggalangan Dana">

    <title>Platform Donasi & Crowdfunding</title>

    <link rel="shortcut icon" href="{{ asset('assets/landing/img/favicon.svg') }}">

    <link rel="stylesheet" href="{{ asset('assets/landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/main.css') }}">
    <style>
    /* 1. Memaksa Footer tetap di paling bawah layar */
    html, body {
        height: 100%;
        margin: 0;
    }
    
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* 2. Memaksa area konten (main) mengambil semua ruang kosong */
    main {
        flex: 1 0 auto;
    }

    /* 3. Memastikan footer tidak mengecil */
    footer, .footer-section {
        flex-shrink: 0;
        background-color: #1a1a1a !important; /* Ganti dengan warna gelap template Mas */
    }

    /* 4. Menghilangkan sela putih yang sering muncul karena margin */
    .project-details-section {
        padding-bottom: 100px; /* Memberi jarak bawah agar tidak mepet footer */
    }
</style>
</head>