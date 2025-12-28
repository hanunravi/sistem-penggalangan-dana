@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Donasi Masuk</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4 border-left-primary">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list-alt me-1"></i> Daftar Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th style="width: 5%" class="text-center">No</th>
                            <th style="width: 30%">Donatur & Paket</th>
                            <th style="width: 15%" class="text-end">Nominal</th>
                            <th style="width: 15%" class="text-center">Status</th>
                            <th style="width: 15%">Tanggal</th>
                            <th style="width: 20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donasi as $key => $d)
                        <tr>
                            <td class="text-center fw-bold">{{ $donasi->firstItem() + $key }}</td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <span class="fw-bold text-dark">{{ $d->donatur_name }}</span>
                                    <small class="text-muted">{{ $d->email ?? '-' }}</small>
                                    
                                    <div class="d-flex flex-wrap gap-2 mt-1">
                                        @if($d->is_anonymous)
                                            <span class="badge bg-secondary text-white">Hamba Allah</span>
                                        @endif

                                        @if($d->nama_paket)
                                            <span class="badge bg-info text-white">
                                                <i class="fas fa-box-open me-1"></i> {{ $d->nama_paket }}
                                            </span>
                                        @elseif($d->jenis_donasi == 'manual')
                                            <span class="badge bg-light text-dark border">
                                                <i class="fas fa-hand-holding-usd me-1"></i> Manual
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="fw-bold text-success text-end">Rp {{ number_format($d->amount, 0, ',', '.') }}</td>
                            <td class="text-center">
                                @if($d->status == 'approved')
                                    <span class="badge rounded-pill bg-success"><i class="fas fa-check me-1"></i> Berhasil</span>
                                @elseif($d->status == 'pending')
                                    <span class="badge rounded-pill bg-warning text-dark"><i class="fas fa-clock me-1"></i> Pending</span>
                                @elseif($d->status == 'rejected')
                                    <span class="badge rounded-pill bg-danger"><i class="fas fa-times me-1"></i> Ditolak</span>
                                @elseif($d->status == 'expired')
                                    <span class="badge rounded-pill bg-secondary">Kadaluarsa</span>
                                @else
                                    <span class="badge rounded-pill bg-secondary">{{ ucfirst($d->status) }}</span>
                                @endif
                            </td>
                            <td class="small">{{ $d->created_at->format('d M Y H:i') }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    @if($d->status == 'pending')
                                        <form action="{{ route('admin.donasi.approve', $d->id) }}" method="POST" onsubmit="return confirm('Konfirmasi terima donasi ini?')" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success" title="Terima">
                                                <i class="fas fa-check me-2"></i> Terima
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.donasi.reject', $d->id) }}" method="POST" onsubmit="return confirm('Konfirmasi tolak donasi ini?')" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning" title="Tolak">
                                                <i class="fas fa-times me-2"></i> Tolak
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.donasi.delete', $d->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini permanen?')" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash-alt me-2"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-5">
                                <img src="https://img.icons8.com/ios/100/cccccc/empty-box.png" alt="Kosong" style="width: 80px; opacity: 0.5;">
                                <p class="text-muted mt-3 fw-bold">Belum ada data donasi masuk.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $donasi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endsection
