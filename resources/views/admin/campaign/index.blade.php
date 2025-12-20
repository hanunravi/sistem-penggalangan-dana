@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Kelola Campaign Donasi</h3>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Bencana / Program</h6>
            <a href="{{ route('admin.campaign.create') }}" class="btn btn-primary btn-sm">Tambah Campaign Baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul Campaign</th>
                            <th>Target & Terkumpul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($campaigns as $key => $cp)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$cp->image) }}" width="100" class="img-thumbnail">
                            </td>
                            <td>{{ $cp->title }}</td>
                            <td>                               
                                <strong>Target:</strong> Rp {{ number_format($cp->target_dana, 0, ',', '.') }} <br>                       
                                <small class="text-success">
                                    <strong>Terkumpul:</strong> Rp {{ number_format($cp->total_donasi_fix, 0, ',', '.') }}
                                </small>
                            </td>
                            <td>
                                <div class="d-flex gap-2"> {{-- TOMBOL EDIT (BARU) --}}
                                    <a href="{{ route('admin.campaign.edit', $cp->id) }}" class="btn btn-warning btn-sm mr-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    {{-- Tombol Hapus (LAMA) --}}
                                    <form action="{{ route('admin.campaign.destroy', $cp->id) }}" method="POST" class="d-inline">
                                        @csrf 
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus campaign?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data campaign. Silakan tambah baru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection