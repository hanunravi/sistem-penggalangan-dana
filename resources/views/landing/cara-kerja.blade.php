@extends('layouts.front')

@section('content')
<div class="container py-5">
    {{-- Judul Halaman --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Cara Kerja Donasi</h2>
        <p class="text-muted">3 Langkah mudah untuk mulai berbagi kebaikan bersama Bizly.</p>
    </div>

    {{-- Grid Langkah-Langkah --}}
    <div class="row text-center g-4">
        
        {{-- Langkah 1 --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 py-4 step-card">
                <div class="card-body">
                    <div class="icon-box mb-4 text-primary bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-search fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">1. Pilih Campaign</h5>
                    <p class="text-muted small px-3">
                        Jelajahi daftar program donasi atau bencana alam yang tersedia dan pilih yang ingin Anda bantu.
                    </p>
                </div>
            </div>
        </div>

        {{-- Langkah 2 --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 py-4 step-card">
                <div class="card-body">
                    <div class="icon-box mb-4 text-primary bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-hand-holding-heart fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">2. Lakukan Donasi</h5>
                    <p class="text-muted small px-3">
                        Masukkan nominal donasi sesuai kemampuan Anda dan pilih metode pembayaran (Transfer Bank/E-Wallet).
                    </p>
                </div>
            </div>
        </div>

        {{-- Langkah 3 --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 py-4 step-card">
                <div class="card-body">
                    <div class="icon-box mb-4 text-primary bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-smile-beam fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">3. Penyaluran Bantuan</h5>
                    <p class="text-muted small px-3">
                        Donasi Anda akan diverifikasi dan disalurkan kepada penerima manfaat secara transparan dan aman.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- Tombol Ajakan (Call to Action) --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 text-center">
            <a href="{{ route('landing.campaign') }}" class="btn btn-primary btn-lg px-5 rounded-pill shadow">
                Mulai Donasi Sekarang <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</div>

{{-- Sedikit CSS Tambahan agar kartu bergerak saat disentuh mouse --}}
<style>
    .step-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .step-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>
@endsection