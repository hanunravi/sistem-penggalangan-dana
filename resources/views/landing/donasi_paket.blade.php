@extends('layouts.front')

@section('content')
<section class="page-banner-section fix section-padding" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                    
                    <div class="card-header bg-primary text-white text-center py-4" style="border-radius: 20px 20px 0 0;">
                        <h3><i class="fas fa-box-open me-2"></i>Konfirmasi Paket Kebaikan</h3>
                    </div>

                    <div class="card-body p-5">
                        
                        {{-- Form Start --}}
                        <form id="paketForm">
                            @csrf
                            
                            {{-- Data Hidden --}}
                            <input type="hidden" name="campaign_id" value="{{ isset($campaign) ? $campaign->id : 0 }}">
                            <input type="hidden" name="jenis_donasi" value="paket">
                            <input type="hidden" name="nama_paket" value="{{ request('nama') }}">
                            <input type="hidden" name="amount" id="inputAmount" value="{{ request('harga') }}">
                            
                            {{-- Info Paket --}}
                            <div class="text-center mb-5 p-4 bg-light rounded border border-primary border-opacity-25">
                                <h5 class="text-muted mb-2">Anda Memilih:</h5>
                                <h2 class="text-primary fw-bold mb-1">{{ request('nama') ?? 'Paket Kebaikan' }}</h2>
                                
                                @if(request('harga') && request('harga') > 0)
                                    <h3 class="text-dark">Rp {{ number_format(request('harga'), 0, ',', '.') }}</h3>
                                @else
                                    <div class="alert alert-danger mt-2">
                                        <i class="fas fa-exclamation-triangle"></i> 
                                        Harga paket tidak valid/kosong. Silakan kembali pilih paket.
                                    </div>
                                @endif
                            </div>

                            {{-- Form Input User --}}
                            <div class="mb-4">
                                <label class="fw-bold mb-2">Nama Donatur</label>
                                <input type="text" name="donatur_name" id="inputNama" class="form-control form-control-lg" placeholder="Nama Lengkap" required>
                                
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_anonymous" value="1" id="anonimCheck">
                                    <label class="form-check-label" for="anonimCheck">Sembunyikan nama (Hamba Allah)</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Email (Opsional)</label>
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Contoh: email@gmail.com">
                                <small class="text-muted">Untuk pengiriman bukti donasi.</small>
                            </div>

                             <div class="mb-4">
                                <label class="fw-bold mb-2">Tujuan Donasi / Kategori</label>
                                <select name="kategori_donasi" class="form-select form-select-lg" style="height: auto; padding: 12px 15px;" required>
                                    <option value="" selected disabled>-- Pilih Tujuan Donasi --</option>
                                    
                                    <optgroup label="Kemanusiaan & Sosial">
                                        <option value="bencana_alam" {{ request('kategori') == 'bencana_alam' ? 'selected' : '' }}>🌋 Bencana Alam & Darurat</option>
                                        <option value="pangan_gizi" {{ request('kategori') == 'pangan_gizi' ? 'selected' : '' }}>🍚 Rice Bowl & Sembako (Pangan)</option>
                                        <option value="infrastruktur" {{ request('kategori') == 'infrastruktur' ? 'selected' : '' }}>🕌 Rumah Ibadah & Infrastruktur</option>
                                        <option value="ekonomi" {{ request('kategori') == 'ekonomi' ? 'selected' : '' }}>💰 Pemberdayaan Ekonomi Dhuafa</option>
                                    </optgroup>

                                    <optgroup label="Kesehatan & Pendidikan">
                                        <option value="medis" {{ request('kategori') == 'medis' ? 'selected' : '' }}>🏥 Bantuan Medis & Kesehatan</option>
                                        <option value="pendidikan" {{ request('kategori') == 'pendidikan' ? 'selected' : '' }}>🎓 Beasiswa & Pendidikan</option>
                                        <option value="penelitian" {{ request('kategori') == 'penelitian' ? 'selected' : '' }}>🔬 Penelitian & Inovasi Sosial</option>
                                    </optgroup>

                                    <optgroup label="Lingkungan & Makhluk Hidup">
                                        <option value="lingkungan" {{ request('kategori') == 'lingkungan' ? 'selected' : '' }}>🌳 Lingkungan Hidup</option>
                                        <option value="satwa" {{ request('kategori') == 'satwa' ? 'selected' : '' }}>🐾 Dunia Satwa & Shelter</option>
                                    </optgroup>

                                    <optgroup label="Kreatif & Profesi">
                                        <option value="seni_kreatif" {{ request('kategori') == 'seni_kreatif' ? 'selected' : '' }}>🎨 Seni, Film & Proyek Kreatif</option>
                                        <option value="guru_honorer" {{ request('kategori') == 'guru_honorer' ? 'selected' : '' }}>👨‍🏫 Dukungan Guru Honorer</option>
                                    </optgroup>
                                    
                                    <option value="lainnya" {{ request('kategori') == 'lainnya' ? 'selected' : '' }}>❤️ Donasi Umum Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Pesan / Doa</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Tulis pesan semangat atau doa..."></textarea>
                            </div>

                            
                            <div class="d-grid gap-2">
                                <button type="button" id="btnBayar" onclick="bayarSekarang()" class="btn btn-primary btn-lg w-100 py-3 fw-bold">
                                    <i class="fas fa-qrcode me-2"></i> Bayar Paket Sekarang
                                </button>
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary py-3">Batal / Ganti Paket</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SCRIPT --}}

@endsection