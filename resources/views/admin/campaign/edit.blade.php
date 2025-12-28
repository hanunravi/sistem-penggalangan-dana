@extends('layouts.admin')

@section('title', 'Edit Campaign')

@section('content')
<div class="container-fluid">

    <div class="d-flex align-items-center justify-content-between mt-4 mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Campaign</h1>
        <a href="{{ route('admin.campaign.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data: {{ $campaign->title }}</h6>
        </div>
        <div class="card-body">
            
            <form action="{{ route('admin.campaign.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label class="form-label fw-bold">Judul Campaign <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $campaign->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label fw-bold">Target Dana (Rp) <span class="text-danger">*</span></label>
                    {{-- Controller expect 'target_dana', Model has 'target_amount' --}}
                    <input type="number" name="target_dana" class="form-control @error('target_dana') is-invalid @enderror" value="{{ old('target_dana', $campaign->target_amount) }}" required>
                    @error('target_dana')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Gambar Saat Ini</label>
                        <div class="card">
                            @if($campaign->image)
                                <img src="{{ asset('storage/' . $campaign->image) }}" class="card-img-top img-fluid" alt="Campaign Image">
                            @else
                                <div class="card-body text-center text-muted">Tidak ada gambar</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-9">
                        <label class="form-label fw-bold">Ganti Gambar (Opsional)</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6" required>{{ old('description', $campaign->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-save me-1"></i> Simpan Perubahan</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection