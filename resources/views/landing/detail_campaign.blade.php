@extends('layouts.front')

@section('content')

{{-- LOGIKA DETEKSI KATEGORI OTOMATIS BERDASARKAN JUDUL --}}
@php
    $judul = strtolower($campaign->title);
    $kategoriOtomatis = 'lainnya'; // Default

    if (Str::contains($judul, ['bencana', 'gempa', 'banjir', 'longsor', 'tsunami', 'gunung', 'erupsi', 'kebakaran', 'darurat'])) {
        $kategoriOtomatis = 'bencana_alam';
    } elseif (Str::contains($judul, ['sembako', 'makan', 'beras', 'gizi', 'lapar', 'pangan', 'jumat', 'dapur'])) {
        $kategoriOtomatis = 'pangan_gizi';
    } elseif (Str::contains($judul, ['masjid', 'musholla', 'bangun', 'renovasi', 'jembatan', 'semen', 'pesantren', 'infrastruktur'])) {
        $kategoriOtomatis = 'infrastruktur';
    } elseif (Str::contains($judul, ['sakit', 'obat', 'sehat', 'operasi', 'medis', 'kesehatan', 'rumahsakit', 'pasien'])) {
        $kategoriOtomatis = 'medis';
    } elseif (Str::contains($judul, ['sekolah', 'buku', 'guru', 'beasiswa', 'yatim', 'santri', 'quran', 'pendidikan', 'belajar', 'cerdas'])) {
        $kategoriOtomatis = 'pendidikan';
    } elseif (Str::contains($judul, ['pohon', 'sampah', 'bersih', 'lingkungan', 'tanam', 'alam', 'hutan'])) {
        $kategoriOtomatis = 'lingkungan';
    } elseif (Str::contains($judul, ['kucing', 'anjing', 'hewan', 'satwa', 'liar', 'pakan', 'shelter'])) {
        $kategoriOtomatis = 'satwa';
    } elseif (Str::contains($judul, ['usaha', 'modal', 'gerobak', 'ekonomi', 'dhuafa', 'dagang', 'borong'])) {
        $kategoriOtomatis = 'ekonomi';
    }
@endphp

<section class="project-details-section fix" style="padding-top: 50px;">
    <div class="container">
        
        {{-- JUDUL --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold display-6">{{ $campaign->title }}</h2>
                <hr style="width: 50px; border: 2px solid #000; margin-top: 10px;">
            </div>
        </div>

        <div class="project-details-wrapper">
            <div class="row g-4 align-items-start">
                
                {{-- KIRI: GAMBAR & DESKRIPSI --}}
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
                
                {{-- KANAN: SIDEBAR DONASI --}}
                <div class="col-lg-4">
                    <div class="main-sidebar sticky-top" style="top: 20px;">
                        <div class="single-sidebar-widget p-4 shadow-sm border bg-white rounded-3" style="margin-top: 0;">
                            <h4 class="mb-3" style="font-size: 1.2rem;">Informasi Donasi</h4>
                            
                            <div class="donation-progress mb-3">
                                <p class="mb-1 text-muted small">Terkumpul:</p>
                                
                                {{-- Menggunakan kolom baru 'current_amount' --}}
                                <h5 class="fw-bold text-success mb-2">
                                    Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}
                                </h5>
                                
                                {{-- Progress Bar --}}
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-success" 
                                         role="progressbar"
                                         style="width: {{ $campaign->persentase }}%"
                                         aria-valuenow="{{ $campaign->persentase }}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                    </div>
                                </div>

                                <p class="text-muted small">
                                    Target: Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
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

{{-- MODAL PILIH METODE --}}
<div class="modal fade" id="modalDonasi" tabindex="-1" aria-labelledby="modalDonasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="modalDonasiLabel">Pilih Metode Donasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    
                    {{-- 1. Donasi Manual --}}
                    <div class="col-12">
                        {{-- PERBAIKAN: Menambahkan parameter kategori --}}
                        <a href="{{ route('donasi.manual', ['id' => $campaign->id, 'kategori' => $kategoriOtomatis]) }}" class="card item-donasi text-decoration-none border p-3 shadow-sm h-100 d-block">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-hand-holding-heart fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Donasi Manual</h6>
                                    <p class="small text-muted mb-0">Masukkan nominal bebas sesuka hati.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- 2. Donasi Paket --}}
                    <div class="col-12">
                        {{-- PERBAIKAN: Menambahkan parameter kategori yang sudah dideteksi di atas --}}
                        <a href="{{ route('donasi.paket', [
                                'id' => $campaign->id,
                                'nama' => 'Paket Donasi: ' . \Illuminate\Support\Str::limit($campaign->title, 20),
                                'harga' => 100000, 
                                'kategori' => $kategoriOtomatis 
                            ]) }}" 
                           class="card item-donasi text-decoration-none border p-3 shadow-sm h-100 d-block">
                            
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-success text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-box-open fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Donasi Paket (Rp 100rb)</h6>
                                    <p class="small text-muted mb-0">Donasi paket cepat dengan nominal tetap.</p>
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
        width: 50px; height: 50px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
</style>
@endsection