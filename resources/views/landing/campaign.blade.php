@extends('layouts.front')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Daftar Program Donasi</h2>
        <p class="text-muted">Mari bantu saudara kita yang membutuhkan uluran tangan.</p>
    </div>

    <div class="row">
        @forelse($campaigns as $item)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                {{-- Gambar Campaign --}}
                <div class="overflow-hidden" style="height: 200px;">
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top w-100 h-100" alt="{{ $item->title }}" style="object-fit: cover;">
                </div>
                
                <div class="card-body d-flex flex-column">
                    {{-- Judul Campaign --}}
                    <h5 class="card-title fw-bold mb-3">
                        <a href="{{ route('campaign.show', $item->id) }}" class="text-decoration-none text-dark">
                            {{ $item->title }}
                        </a>
                    </h5> 
                    
                    {{-- Deskripsi Singkat --}}
                    <p class="card-text text-muted small mb-4">
                        {{ Str::limit($item->description, 80) }}
                    </p>

                    <div class="mt-auto">
                        {{-- LOGIKA PINTAR: Cek kolom baru, kalau kosong cek kolom lama --}}
                        @php
                            // Ambil Target (Prioritas: target_amount -> target_dana -> 0)
                            $target = $item->target_amount ?? $item->target_dana ?? 0;
                            
                            // Ambil Terkumpul (Prioritas: current_amount -> nominal_terkumpul -> 0)
                            $terkumpul = $item->current_amount ?? $item->nominal_terkumpul ?? 0;

                            // Hitung Persen
                            $persen = 0;
                            if($target > 0) {
                                $persen = ($terkumpul / $target) * 100;
                                $persen = min(100, $persen); // Mentok di 100%
                            }
                        @endphp

                        {{-- Progress Bar --}}
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-primary" role="progressbar" 
                                 style="width: {{ $persen }}%"
                                 aria-valuenow="{{ $persen }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>                       
                        
                        {{-- Info Angka --}}
                        <div class="d-flex justify-content-between small fw-bold mb-3">
                            <div>
                                <span class="text-muted fw-normal">Terkumpul:</span><br> 
                                <span class="text-success">Rp {{ number_format($terkumpul, 0, ',', '.') }}</span>
                            </div>
                            <div class="text-end">
                                <span class="text-muted fw-normal">Target:</span><br> 
                                <span>Rp {{ number_format($target, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        
                        {{-- Tombol Link ke Detail --}}
                        <a href="{{ route('campaign.show', $item->id) }}" class="btn btn-dark w-100">
                            Donasi Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-info d-inline-block px-5">
                    <i class="fas fa-info-circle me-2"></i> Belum ada campaign donasi saat ini.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection