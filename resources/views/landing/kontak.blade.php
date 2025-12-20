@extends('layouts.front')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-center mb-4">Hubungi Kami</h3>
                    <p class="text-center text-muted mb-5">Punya pertanyaan seputar donasi? Silakan hubungi kami.</p>
                    
                    <div class="row mb-5">
                        {{-- Info Alamat --}}
                        <div class="col-md-4 text-center mb-3">
                            <div class="mb-2 text-primary">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <h6 class="fw-bold">Alamat</h6>
                            <p class="small text-muted">Jl. Kebaikan No. 1<br>Jakarta Pusat, Indonesia</p>
                        </div>

                        {{-- Info Telepon --}}
                        <div class="col-md-4 text-center mb-3">
                            <div class="mb-2 text-primary">
                                <i class="fas fa-phone fa-2x"></i>
                            </div>
                            <h6 class="fw-bold">Telepon / WhatsApp</h6>
                            <p class="small text-muted">+62 812 3456 7890<br>Senin - Jumat (09:00 - 17:00)</p>
                        </div>

                        {{-- Info Email --}}
                        <div class="col-md-4 text-center mb-3">
                            <div class="mb-2 text-primary">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <h6 class="fw-bold">Email</h6>
                            <p class="small text-muted">support@bizly.com<br>info@bizly.com</p>
                        </div>
                    </div>

                    <hr class="mb-5">

                    {{-- Form Kontak (Tampilan Saja) --}}
                    <h5 class="fw-bold mb-3">Kirim Pesan</h5>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama Anda">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="email@contoh.com">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subjek</label>
                            <input type="text" class="form-control" placeholder="Judul Pesan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea class="form-control" rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <button type="button" class="btn btn-primary px-4">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection