@extends('layouts.front')

@section('content')

{{-- BREADCRUMB --}}
<section class="breadcrumb-area" style="background-color: #f4f6f9; padding: 40px 0;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 ps-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kabar Lapangan</li>
            </ol>
        </nav>
    </div>
</section>

{{-- KONTEN DETAIL --}}
<section class="blog-details-area" style="padding: 70px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <article class="blog-details bg-white p-0 p-md-4">
                    
                    {{-- Judul --}}
                    <h1 class="mb-4 font-weight-bold">{{ $post->title }}</h1>
                    
                    {{-- Info Tanggal --}}
                    <div class="text-muted mb-4">
                        <i class="far fa-calendar-alt text-primary me-2"></i> 
                        {{ $post->created_at->format('d F Y') }}
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-5 rounded-3 overflow-hidden shadow-sm">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="img-fluid w-100">
                    </div>

                    {{-- Isi Berita --}}
                    <div class="blog-content text-dark" style="font-size: 1.15rem; line-height: 1.9; text-align: justify;">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    {{-- Tombol Kembali --}}
                    <div class="mt-5 pt-4 border-top">
                        <a href="{{ route('home') }}" class="btn btn-light border rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Home
                        </a>
                    </div>

                </article>
            </div>
        </div>
    </div>
</section>
@endsection