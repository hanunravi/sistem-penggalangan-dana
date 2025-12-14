@extends('layouts.front')

@section('content')
<section class="page-banner-section fix section-padding" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                    <div class="card-header bg-success text-white text-center py-4" style="border-radius: 20px 20px 0 0;">
                        <h3><i class="fas fa-hand-holding-usd me-2"></i>Formulir Donasi Sukarela</h3>
                        <p class="mb-0">Silakan isi nominal donasi sesuai keikhlasan Anda.</p>
                    </div>
                    <div class="card-body p-5">
                        
                        <form id="manualDonationForm" action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="jenis_donasi" value="manual">

                            <!-- 1. Input Nominal -->
                            <div class="mb-4">
                                <label class="fw-bold mb-2">Mau Donasi Berapa?</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light fw-bold">Rp</span>
                                    <input type="number" name="amount" class="form-control" placeholder="Min: 10.000" min="10000" required>
                                </div>
                                <small class="text-muted">Nominal bebas, minimal Rp 10.000</small>
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

                            <!-- 3. Data Diri -->
                            <div class="mb-4">
                                <label class="fw-bold mb-2">Nama Donatur</label>
                                <input type="text" name="donatur_name" id="inputNama" class="form-control form-control-lg" placeholder="Nama Lengkap">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="anonimCheck">
                                    <label class="form-check-label" for="anonimCheck">Sembunyikan nama saya (Hamba Allah)</label>
                                </div>
                            </div>

                            <!-- 4. Pesan -->
                            <div class="mb-4">
                                <label class="fw-bold mb-2">Pesan / Doa</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Tulis pesan semangat atau doa..."></textarea>
                            </div>

                            <!-- Info Transfer -->
                            <div class="alert alert-info d-flex align-items-center mb-4">
                                <i class="fas fa-info-circle fa-2x me-3"></i>
                                <div>
                                    Silakan transfer ke rekening resmi kami:<br>
                                    <strong>BCA 123-456-7890</strong> a.n Yayasan Peduli Sesama
                                </div>
                            </div>

                            <!-- 5. Upload Bukti -->
                            <div class="mb-4">
                                <label class="fw-bold mb-2">Upload Bukti Transfer</label>
                                <input type="file" name="payment_proof" class="form-control form-control-lg" accept="image/*" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="theme-btn border-0 py-3">Kirim Donasi Sekarang</button>
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary py-3">Batal / Kembali</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
{{-- Load Library SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // 1. Script Anonim (Hamba Allah)
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

    // 2. Script SweetAlert saat Submit
    document.getElementById('manualDonationForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah submit asli sementara
        
        // Tampilkan Popup Sukses
        Swal.fire({
            title: 'Terima Kasih!',
            text: 'Donasi Anda telah kami terima dan sedang diverifikasi. Semoga menjadi berkah!',
            icon: 'success',
            confirmButtonText: 'Kembali ke Home',
            confirmButtonColor: '#28a745'
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan user ke halaman utama setelah klik OK
                window.location.href = "{{ url('/') }}";
            }
        });
    });
</script>
@endpush
@endsection