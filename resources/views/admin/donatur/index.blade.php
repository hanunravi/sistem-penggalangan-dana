@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Donatur</h1>
    
    <div class="alert alert-info shadow-sm">
        <i class="fas fa-info-circle"></i> Halaman ini menampilkan daftar orang yang sudah pernah berdonasi dengan status <b>Berhasil (Approved)</b>.
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Top Donatur</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Lengkap</th>
                            <th>Email </th>
                            <th>Total Menyumbang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donatur as $key => $user)
                        <tr>
                            <td>{{ $donatur->firstItem() + $key }}</td>
                            <td>
                                <span class="font-weight-bold">{{ $user->donatur_name }}</span>
                            </td>
                            <td>
                                <i class="fas fa-envelope fa-fw text-muted"></i> {{ $user->email ?? '-' }}<br>
                                <i class="fas fa-phone fa-fw text-muted"></i> {{ $user->no_hp ?? '-' }}
                            </td>
                            <td class="font-weight-bold text-success">
                                Rp {{ number_format($user->total_donasi, 0, ',', '.') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center p-3">Belum ada data donatur.</td>
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