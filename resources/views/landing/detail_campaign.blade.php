@extends('layouts.front')

@section('content')
<section class="project-details-section fix" style="padding-top: 50px;">
    <div class="container">
        
        {{-- 1. JUDUL DI ATAS --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold display-6">{{ $campaign->title }}</h2>
                <hr style="width: 50px; border: 2px solid #000; margin-top: 10px;">
            </div>
        </div>

        <div class="project-details-wrapper">
            {{-- 2. GUNAKAN align-items-start AGAR ATASNYA SEJAJAR --}}
            <div class="row g-4 align-items-start">
                
                {{-- AREA GAMBAR & DESKRIPSI (KIRI) --}}
                <div class="col-lg-8">
                    <div class="project-details-image mb-4">
                        <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}" 
                             class="w-100 rounded-4 shadow-sm" style="object-fit: cover;">
                    </div>
                    
                    <div class="project-details-content">
                        <h3 class="mb-3">Deskripsi Kejadian</h3>
                        <p style="text-align: justify; line-height: 1.8; color: #444;">
                            {!! nl2br(e($campaign->description)) !!}
                        </p>
                    </div>
                </div>
                
                {{-- SIDEBAR KOTAK DONASI (KANAN) --}}
                <div class="col-lg-4">
                    {{-- Berikan margin-top: 0 agar tidak naik melebihi gambar --}}
                    <div class="main-sidebar sticky-top" style="top: 20px;">
                        <div class="single-sidebar-widget p-4 shadow-sm border bg-white rounded-3" style="margin-top: 0;">
                            <h4 class="mb-3" style="font-size: 1.2rem;">Informasi Donasi</h4>
                            
                            <div class="donation-progress mb-3">
                                <p class="mb-1 text-muted small">Terkumpul:</p>
                                
                                {{-- PERUBAHAN 1: Panggil 'total_donasi_fix' (bukan nominal_terkumpul) --}}
                                <h5 class="fw-bold text-success mb-2">
                                    Rp {{ number_format($campaign->total_donasi_fix, 0, ',', '.') }}
                                </h5>
                                
                                {{-- PERUBAHAN 2: Gunakan 'persentase' dari Model (Hapus @php manual tadi) --}}
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-success" 
                                        role="progressbar"
                                        style="width: {{ $campaign->persentase }}%"
                                        aria-valuenow="{{ $campaign->persentase }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100">
                                    </div>
                                </div>

                                {{-- Target Dana --}}
                                <p class="text-muted small">
                                    Target: Rp {{ number_format($campaign->target_dana, 0, ',', '.') }}
                                </p>
                            </div>

                            <button type="button" class="btn btn-dark w-100 py-3 fw-bold shadow-sm rounded-pill text-white" data-bs-toggle="modal" data-bs-target="#modalDonasi">
                                    Donasi Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modalDonasi" tabindex="-1" aria-labelledby="modalDonasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="modalDonasiLabel">Pilih Metode Donasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    {{-- Opsi Donasi Manual --}}
                    <div class="col-12">
                        <a href="{{ route('donasi.manual', $campaign->id) }}" class="card item-donasi text-decoration-none border p-3 shadow-sm h-100 d-block">
                            {{-- PERBAIKAN: Menambahkan div d-flex align-items-center di sini --}}
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-hand-holding-heart fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Donasi Manual</h6>
                                    <p class="small text-muted mb-0">Masukkan nominal bebas sesuai keinginan Anda.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- Opsi Donasi Paket --}}
                    <div class="col-12">
                        <a href="{{ route('donasi.paket', $campaign->id) }}" class="card item-donasi text-decoration-none border p-3 shadow-sm h-100 d-block">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-success text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-box-open fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Donasi Paket</h6>
                                    <p class="small text-muted mb-0">Pilih paket bantuan yang sudah tersedia.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .item-donasi:hover {
        border-color: #0d6efd !important;
        background-color: #f8f9fa;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
    .icon-box {
        width: 50px;
        height: 50px;
        display: flex; /* Flexbox untuk menengahkan icon */
        align-items: center;
        justify-content: center;
        flex-shrink: 0; /* Mencegah kotak mengecil jika teks panjang */
    }
</style>
@endsection