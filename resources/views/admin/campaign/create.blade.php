@extends('layouts.admin')

@section('title', 'Tambah Campaign Baru')

@section('content')
<div class="container-fluid">
    
    <div class="d-flex align-items-center justify-content-between mt-4 mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Campaign Baru</h1>
        <a href="{{ route('admin.campaign.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Campaign</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.campaign.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group mb-3">
                    <label class="form-label fw-bold">Judul Campaign / Nama Bencana <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Contoh: Peduli Gempa Cianjur" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label fw-bold">Target Dana (Rp) <span class="text-danger">*</span></label>
                    {{-- NAME HARUS target_dana AGAR SESUAI CONTROLLER --}}
                    <input type="number" name="target_dana" class="form-control @error('target_dana') is-invalid @enderror" value="{{ old('target_dana') }}" placeholder="Contoh: 100000000" min="10000" required>
                    <small class="text-muted">Masukkan angka saja tanpa titik/koma.</small>
                    @error('target_dana')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label fw-bold">Gambar Utama <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                    <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Deskripsi Bencana <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6" placeholder="Ceritakan detail kondisi bencana, lokasi, dan kebutuhan mendesak..." required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan Campaign</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection