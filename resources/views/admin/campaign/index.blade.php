@extends('layouts.admin')

@section('title', 'Kelola Campaign')

@section('content')
<div class="container-fluid">
    
    <div class="d-flex align-items-center justify-content-between mt-4 mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Campaign Donasi</h1>
        <a href="{{ route('admin.campaign.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Campaign Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Program Bencana</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 15%">Gambar</th>
                            <th>Detail Campaign</th>
                            <th style="width: 25%">Progress Dana</th>
                            <th style="width: 15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($campaigns as $key => $cp)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="avatar avatar-lg rounded">
                                    <img src="{{ asset('storage/'.$cp->image) }}" class="avatar-img rounded" alt="{{ $cp->title }}" style="object-fit: cover; height: 100%;">
                                </div>
                            </td>
                            <td>
                                <h6 class="mb-1 fw-bold text-dark">{{ $cp->title }}</h6>
                                <p class="text-muted small mb-0 text-truncate" style="max-width: 250px;">
                                    {{ Str::limit($cp->description, 60) }}
                                </p>
                                <span class="badge badge-soft-{{ $cp->status == 'active' ? 'success' : 'secondary' }} mt-1">
                                    {{ ucfirst($cp->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="mb-1 d-flex justify-content-between small">
                                    <span class="text-muted">Terkumpul:</span>
                                    <span class="fw-bold text-success">Rp {{ number_format($cp->current_amount, 0, ',', '.') }}</span>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    @php
                                        $percent = $cp->target_amount > 0 ? ($cp->current_amount / $cp->target_amount) * 100 : 0;
                                        $percent = min(100, $percent); // Max 100%
                                    @endphp
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="mt-1 d-flex justify-content-between small">
                                    <span class="text-muted">Target:</span>
                                    <span class="fw-bold text-dark">Rp {{ number_format($cp->target_amount, 0, ',', '.') }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.campaign.edit', $cp->id) }}" class="btn btn-icon btn-flush-warning btn-rounded flush-soft-hover" title="Edit">
                                        <span class="icon"><i class="fas fa-edit"></i></span>
                                    </a>
                                    
                                    <form action="{{ route('admin.campaign.destroy', $cp->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus campaign ini? Data tidak bisa dikembalikan.')">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-flush-danger btn-rounded flush-soft-hover" title="Hapus">
                                            <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center p-5">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="https://img.icons8.com/ios/100/cccccc/empty-box.png" alt="Kosong" style="width: 80px; opacity: 0.5;">
                                    <p class="text-muted mt-3 fw-bold">Belum ada campaign yang dibuat.</p>
                                    <a href="{{ route('admin.campaign.create') }}" class="btn btn-primary btn-sm mt-2">
                                        <i class="fas fa-plus"></i> Buat Campaign Sekarang
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection