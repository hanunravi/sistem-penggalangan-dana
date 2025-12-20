@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Tambah Campaign Baru</h3>
    <div class="card shadow mt-3">
        <div class="card-body">
            <form action="{{ route('admin.campaign.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label>Judul Campaign / Nama Bencana</label>
                    <input type="text" name="title" class="form-control" placeholder="Contoh: Peduli Gempa Cianjur" required>
                </div>
                <div class="form-group mb-3">
                    <label>Target Dana (Rp)</label>
                    <input type="number" name="target_dana" class="form-control" placeholder="Contoh: 100000000" required>
                </div>
                <div class="form-group mb-3">
                    <label>Gambar Utama</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Deskripsi Bencana</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Ceritakan kondisi bencana..." required></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Campaign</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection