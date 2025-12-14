@extends('layouts.front')

@section('content')
<section class="page-banner-section fix section-padding" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                    <div class="card-header bg-primary text-white text-center py-4" style="border-radius: 20px 20px 0 0;">
                        <h3><i class="fas fa-box-open me-2"></i>Konfirmasi Paket Kebaikan</h3>
                        <p class="mb-0">Terima kasih telah memilih untuk berbagi paket ini.</p>
                    </div>
                    <div class="card-body p-5">
                        
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="jenis_donasi" value="paket">

                            <!-- Detail Paket (Readonly) -->
                            <div class="text-center mb-5 p-4 bg-light rounded border border-primary border-opacity-25">
                                <h5 class="text-muted mb-2">Anda Memilih:</h5>
                                <h2 class="text-primary fw-bold mb-1">{{ request('nama') ?? 'Paket Kebaikan' }}</h2>
                                <h3 class="text-dark">Rp {{ number_format(request('harga'), 0, ',', '.') }}</h3>
                                
                                {{-- Simpan data untuk dikirim ke backend --}}
                                <input type="hidden" name="nama_paket" value="{{ request('nama') }}">
                                <input type="hidden" name="amount" value="{{ request('harga') }}">
                            </div>

                            <!-- Data Diri -->
                            <div class="mb-4">
                                <label class="fw-bold mb-2">Nama Donatur</label>
                                <input type="text" name="donatur_name" id="inputNama" class="form-control form-control-lg" placeholder="Nama Lengkap">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="anonimCheck">
                                    <label class="form-check-label" for="anonimCheck">Sembunyikan nama saya (Hamba Allah)</label>
                                </div>
                            </div>

                       <!-- 2. Kategori Donasi (Auto Select) -->
                            <div class="mb-4">
                                <label class="fw-bold mb-2">Tujuan Donasi / Kategori</label>
                                <select name="kategori_donasi" class="form-select form-select-lg" style="height: auto; padding: 12px 15px;" required>
                                    <option value="" selected disabled>-- Pilih Tujuan Donasi --</option>
                                    
                                    <optgroup label="Kemanusiaan & Sosial">
                                        <option value="bencana_alam" {{ request('kategori') == 'bencana_alam' ? 'selected' : '' }}>🌋 Bencana Alam & Darurat</option>
                                        <option value="pangan_gizi" {{ request('kategori') == 'pangan_gizi' ? 'selected' : '' }}>🍚 Rice Bowl & Sembako (Pangan)</option>
                                        <option value="infrastruktur" {{ request('kategori') == 'infrastruktur' ? 'selected' : '' }}>🕌 Pembangunan Masjid & Infrastruktur</option>
                                        <option value="ekonomi" {{ request('kategori') == 'ekonomi' ? 'selected' : '' }}>💰 Pemberdayaan Ekonomi Dhuafa</option>
                                    </optgroup>

                                    <optgroup label="Kesehatan & Pendidikan">
                                        <option value="medis" {{ request('kategori') == 'medis' ? 'selected' : '' }}>🏥 Bantuan Medis & Kesehatan</option>
                                        <option value="pendidikan" {{ request('kategori') == 'pendidikan' ? 'selected' : '' }}>🎓 Beasiswa & Pendidikan</option>
                                        <option value="penelitian" {{ request('kategori') == 'penelitian' ? 'selected' : '' }}>🔬 Penelitian & Inovasi Sosial</option>
                                    </optgroup>

                                    <optgroup label="Lingkungan & Makhluk Hidup">
                                        <option value="lingkungan" {{ request('kategori') == 'lingkungan' ? 'selected' : '' }}>🌳 Lingkungan Hidup (Penanaman Pohon)</option>
                                        <option value="satwa" {{ request('kategori') == 'satwa' ? 'selected' : '' }}>🐾 Konservasi Satwa & Shelter Hewan</option>
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

                            <!-- Info Transfer -->
                            <div class="alert alert-warning d-flex align-items-center mb-4">
                                <i class="fas fa-wallet fa-2x me-3"></i>
                                <div>
                                    Total yang harus ditransfer:<br>
                                    <strong class="fs-5">Rp {{ number_format(request('harga'), 0, ',', '.') }}</strong><br>
                                    <small>Ke BCA 123-456-7890 a.n Yayasan Peduli Sesama</small>
                                </div>
                            </div>

                            <!-- Upload Bukti -->
                            <div class="mb-4">
                                <label class="fw-bold mb-2">Upload Bukti Transfer</label>
                                <input type="file" name="payment_proof" class="form-control form-control-lg" accept="image/*" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="theme-btn border-0 py-3">Konfirmasi Pembayaran</button>
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary py-3">Ganti Paket</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.getElementById('anonimCheck').addEventListener('change', function() {
        var inputNama = document.getElementById('inputNama');
        if(this.checked) {
            inputNama.value = 'Hamba Allah';
            inputNama.readOnly = true;
        } else {
            inputNama.value = '';
            inputNama.readOnly = false;
        }
    });
</script>
@endpush
@endsection