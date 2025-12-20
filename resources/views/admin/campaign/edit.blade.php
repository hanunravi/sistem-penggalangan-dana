@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary btn-sm mb-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Campaign: {{ $campaign->title }}</h6>
        </div>
        <div class="card-body">
            
            {{-- Form Update --}}
            <form action="{{ route('admin.campaign.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- WAJIB: Mengubah method POST menjadi PUT --}}

                <div class="form-group mb-3">
                    <label>Judul Campaign</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $campaign->title) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Target Dana (Rp)</label>
                    <input type="number" name="target_dana" class="form-control" value="{{ old('target_dana', $campaign->target_dana) }}" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Gambar Saat Ini</label><br>
                        <img src="{{ asset('storage/' . $campaign->image) }}" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                    <div class="col-md-8">
                        <label>Ganti Gambar (Opsional)</label>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ old('description', $campaign->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>

        </div>
    </div>
</div>
@endsection