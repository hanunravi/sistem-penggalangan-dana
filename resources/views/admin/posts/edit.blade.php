@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Edit Kabar Lapangan</h3>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label>Judul Kabar</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Gambar Saat Ini</label><br>
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail rounded" width="100%">
                    </div>
                    <div class="col-md-9">
                        <label>Ganti Gambar (Opsional)</label>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Isi Berita</label>
                    <textarea name="content" class="form-control" rows="10" required>{{ old('content', $post->content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">Update Data</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection