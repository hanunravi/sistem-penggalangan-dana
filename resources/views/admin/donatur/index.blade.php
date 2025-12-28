@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Donatur Terdaftar</h1>
    
    <div class="alert alert-info shadow-sm border-left-info">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-users fa-2x text-info"></i>
            </div>
            <div>
                <span class="font-weight-bold">Informasi:</span>
                Halaman ini menampilkan daftar donatur unik yang transaksinya berstatus <b>Berhasil (Approved)</b>.
                Data diurutkan berdasarkan total nominal donasi terbesar.
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Top Donatur</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Lengkap</th>
                            <th>Kontak</th>
                            <th>Total Donasi Sukses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donatur as $key => $user)
                        <tr>
                            <td>{{ $donatur->firstItem() + $key }}</td>
                            <td>
                                <span class="font-weight-bold text-dark">{{ $user->donatur_name }}</span>
                            </td>
                            <td>
                                @if($user->email)
                                    <div class="mb-1"><i class="fas fa-envelope fa-fw text-primary"></i> {{ $user->email }}</div>
                                @else
                                    <div class="text-muted small">Email tidak disertakan</div>
                                @endif
                            </td>
                            <td>
                                <h5 class="m-0 font-weight-bold text-success">
                                    Rp {{ number_format($user->total_donasi, 0, ',', '.') }}
                                </h5>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center p-5">
                                <i class="fas fa-user-slash fa-3x text-gray-300 mb-3"></i>
                                <p class="text-muted">Belum ada data donatur yang tercatat.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $donatur->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection