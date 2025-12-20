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
                <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                
                <div class="card-body d-flex flex-column">
                    {{-- Judul Campaign --}}
                    <h5 class="card-title fw-bold mb-4">{{ $item->title }}</h5>                   
                    <div class="mt-auto">
                        {{-- Progress Bar (Menggunakan variabel dari Model) --}}
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" 
                                 style="width: {{ $item->persentase }}%"
                                 aria-valuenow="{{ $item->persentase }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>                       
                        {{-- Info Angka (Menggunakan variabel dari Model) --}}
                        <div class="d-flex justify-content-between small fw-bold mb-3">
                            <div>
                                <span class="text-muted fw-normal">Terkumpul:</span><br> 
                                <span class="text-success">Rp {{ number_format($item->total_donasi_fix, 0, ',', '.') }}</span>
                            </div>
                            <div class="text-end">
                                <span class="text-muted fw-normal">Target:</span><br> 
                                <span>Rp {{ number_format($item->target_dana, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        {{-- Tombol Link ke Detail --}}
                        <a href="{{ route('campaign.show', $item->id) }}" class="btn btn-dark w-100">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-info">Belum ada campaign donasi saat ini.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection