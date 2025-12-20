@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Tulis Kabar Lapangan</h3>
    <div class="card p-4 shadow-sm">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="fw-bold">Judul Berita</label>
                <input type="text" name="title" class="form-control" required placeholder="Misal: Penyaluran Bantuan Desa Sukamaju">
            </div>
            
            <div class="mb-3">
                <label class="fw-bold">Gambar Utama</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Isi Berita</label>
                <textarea name="content" class="form-control" rows="10" required placeholder="Tulis cerita lengkap di sini..."></textarea>
            </div>

            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Terbitkan Berita</button>
        </form>
    </div>
</div>
@endsection