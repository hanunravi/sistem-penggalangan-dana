@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Riwayat Donasi Masuk</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Donatur</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Bukti Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donasi as $key => $d)
                        <tr>
                            <td>{{ $donasi->firstItem() + $key }}</td>
                            <td>
                                <b>{{ $d->donatur_name }}</b><br>
                                <span class="small text-muted">{{ $d->email ?? '-' }}</span>
                            </td>
                            <td>Rp {{ number_format($d->amount, 0, ',', '.') }}</td>
                            <td>
                                @if($d->status == 'approved')
                                    <span class="badge" style="background-color: #198754 !important; color: white !important;">Berhasil</span>                                    
                                @elseif($d->status == 'pending')
                                    <span class="badge" style="background-color: #ffc107 !important; color: black !important;">Pending</span>                                    
                                @else
                                    <span class="badge" style="background-color: #dc3545 !important; color: white !important;">Ditolak</span>
                                @endif
                            </td>
                            <td>{{ $d->created_at->format('d M Y') }}</td>
                            <td>
                                @if($d->payment_proof)
                                    {{-- BAGIAN 1: TOMBOL DIUBAH --}}
                                    <a href="javascript:void(0)" 
                                       class="btn btn-sm btn-info"
                                       data-bs-toggle="modal" 
                                       data-bs-target="#modalBukti"
                                       data-foto="{{ asset('storage/payment_proof/'.$d->payment_proof) }}">
                                        <i class="fas fa-image"></i> Lihat
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-3">Belum ada data donasi masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-3">
                    {{ $donasi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- BAGIAN 2: MODAL POPUP (Ditambahkan di luar Card/Tabel) --}}
<div class="modal fade" id="modalBukti" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bukti Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center bg-light">
                <img src="" id="img-tampil" class="img-fluid rounded shadow" style="max-height: 80vh;" alt="Bukti Transfer">
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modalBukti = document.getElementById('modalBukti');
        
        // Cek apakah modal ditemukan sebelum menjalankan script
        if (modalBukti) {
            modalBukti.addEventListener('show.bs.modal', function (event) {
                // Tombol yang diklik
                var button = event.relatedTarget;
                // Ambil link gambar dari atribut data-foto
                var urlGambar = button.getAttribute('data-foto');
                
                // Masukkan link ke tag <img> di dalam modal
                var modalImg = modalBukti.querySelector('#img-tampil');
                modalImg.src = urlGambar;
            });
        }
    });
</script>

@endsection