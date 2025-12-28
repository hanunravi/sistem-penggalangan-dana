@extends('layouts.admin')

@section('title', 'Hasil Pencarian')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mt-4 mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Hasil Pencarian</h1>
            <p class="text-muted">Menampilkan hasil untuk kata kunci: <strong>"{{ $keyword }}"</strong></p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if($donasi->isEmpty() && $campaigns->isEmpty() && $posts->isEmpty())
        <div class="alert alert-warning shadow-sm">
            <i class="fas fa-search me-2"></i> Tidak ditemukan data yang cocok dengan kata kunci tersebut.
        </div>
    @endif

    <div class="row">
        {{-- HASIL DONASI --}}
        <div class="col-md-12 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-light d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-hand-holding-usd me-2"></i> Donasi Ditemukan ({{ $donasi->count() }})</h6>
                </div>
                <div class="card-body p-0">
                    @if($donasi->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Donatur</th>
                                        <th>Nominal</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donasi as $d)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $d->donatur_name }}</span><br>
                                            <span class="small text-muted">{{ $d->email }}</span>
                                        </td>
                                        <td class="text-success fw-bold">Rp {{ number_format($d->amount, 0, ',', '.') }}</td>
                                        <td>
                                            @if($d->status == 'approved') <span class="badge bg-success">Sukses</span>
                                            @elseif($d->status == 'pending') <span class="badge bg-warning text-dark">Pending</span>
                                            @else <span class="badge bg-danger">Gagal</span>
                                            @endif
                                        </td>
                                        <td>{{ $d->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-light btn-icon rounded-circle" data-bs-toggle="tooltip" title="Detail (Coming Soon)">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-4 text-center text-muted">Tidak ada data donasi yang cocok.</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- HASIL CAMPAIGN --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-light">
                    <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-bullhorn me-2"></i> Program (Campaign)</h6>
                </div>
                <div class="card-body">
                    @if($campaigns->isNotEmpty())
                        <ul class="list-group list-group-flush">
                            @foreach($campaigns as $c)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm rounded me-3">
                                        <img src="{{ asset('storage/' . $c->image) }}" alt="img" class="avatar-img" onerror="this.src='https://via.placeholder.com/50'">
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-truncate" style="max-width: 200px;">{{ $c->title }}</h6>
                                        <small class="text-muted">Target: Rp {{ number_format($c->target_dana) }}</small>
                                    </div>
                                </div>
                                <a href="{{ route('admin.campaign.edit', $c->id) }}" class="btn btn-xs btn-outline-primary">Edit</a>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center text-muted py-3">Tidak ada campaign ditemukan.</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- HASIL BERITA --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-light">
                    <h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-newspaper me-2"></i> Berita / Kabar</h6>
                </div>
                <div class="card-body">
                    @if($posts->isNotEmpty())
                        <ul class="list-group list-group-flush">
                            @foreach($posts as $p)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0 text-truncate" style="max-width: 250px;">{{ $p->title }}</h6>
                                    <small class="text-muted">{{ $p->created_at->diffForHumans() }}</small>
                                </div>
                                <a href="{{ route('admin.posts.edit', $p->id) }}" class="btn btn-xs btn-outline-warning">Edit</a>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center text-muted py-3">Tidak ada berita ditemukan.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection