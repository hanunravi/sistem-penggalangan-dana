@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    
    <h3 class="mb-4">Kelola Kabar Lapangan (Umum)</h3>

    <div class="card border-0 shadow-sm rounded">
        
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                
                <h6 class="m-0 font-weight-bold text-primary">Daftar Berita Terpublis</h6>

                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus-circle"></i> Tulis Kabar Baru
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 15%">Gambar</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $key => $post)
                        <tr>
                            <td>{{ $posts->firstItem() + $key }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$post->image) }}" width="80" class="img-thumbnail">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    {{-- TOMBOL EDIT (BARU) --}}
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm mr-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- TOMBOL HAPUS --}}
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus berita ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection