<!DOCTYPE html>
<html lang="id">

{{-- 1. PANGGIL HEAD (Yang sudah diperbaiki di atas) --}}
@include('partials.landing.head')

<body class="body-bg">

    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="B" class="letters-loading">B</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
                <span data-text-preloader="M" class="letters-loading">M</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="L" class="letters-loading">L</span>
                <span data-text-preloader="L" class="letters-loading">L</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="H" class="letters-loading">H</span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left"><div class="bg"></div></div>
                <div class="col-3 loader-section section-left"><div class="bg"></div></div>
                <div class="col-3 loader-section section-right"><div class="bg"></div></div>
                <div class="col-3 loader-section section-right"><div class="bg"></div></div>
            </div>
        </div>
    </div>

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <button id="back-top" class="back-to-top">
        <i class="fa-regular fa-arrow-up"></i>
    </button>

    {{-- 2. HEADER & NAVBAR (Menu Utama) --}}
    @include('partials.landing.header')
    @include('partials.landing.navbar')

    {{-- 3. KONTEN HALAMAN (Home, About, dll) --}}
    <main>
        @yield('content')
    </main>

    {{-- 4. FOOTER --}}
    @include('partials.landing.footer')

    {{-- 5. SCRIPT JS --}}
    @include('partials.landing.script')

   

</body>
</html>