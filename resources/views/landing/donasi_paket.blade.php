@extends('layouts.front')

@section('content')
<section class="page-banner-section fix section-padding" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                    <div class="card-header bg-primary text-white text-center py-4" style="border-radius: 20px 20px 0 0;">
                        <h3><i class="fas fa-box-open me-2"></i>Konfirmasi Paket Kebaikan</h3>
                        
                        {{-- [PERUBAHAN 1] Menampilkan Info Campaign --}}
                        @if(isset($campaign) && $campaign)
                            <div class="mt-2 text-white" style="background: rgba(255,255,255,0.2); padding: 5px; border-radius: 10px;">
                                <small>Untuk Program:</small><br>
                                <strong>{{ $campaign->nama_campaign }}</strong>
                            </div>
                        @else
                            <p class="mb-0">Terima kasih telah memilih untuk berbagi paket ini.</p>
                        @endif

                    </div>
                    <div class="card-body p-5">
                        
                        <form action="{{ route('donasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            {{-- [PERUBAHAN 2] PENCEGAH ERROR (PENTING!) --}}
                            @if(isset($campaign) && $campaign)
                                <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                            @else
                                <input type="hidden" name="campaign_id" value="0">
                            @endif

                            <input type="hidden" name="jenis_donasi" value="paket">
                            <input type="hidden" name="nama_paket" value="{{ request('nama') }}">
                            <input type="hidden" name="amount" value="{{ request('harga') }}">

                            <div class="text-center mb-5 p-4 bg-light rounded border border-primary border-opacity-25">
                                <h5 class="text-muted mb-2">Anda Memilih:</h5>
                                <h2 class="text-primary fw-bold mb-1">{{ request('nama') ?? 'Paket Kebaikan' }}</h2>
                                <h3 class="text-dark">Rp {{ number_format(request('harga'), 0, ',', '.') }}</h3>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Nama Donatur</label>
                                <input type="text" name="donatur_name" id="inputNama" class="form-control form-control-lg" placeholder="Nama Lengkap" required>
                                
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_anonymous" value="1" id="anonimCheck">
                                    <label class="form-check-label" for="anonimCheck">Sembunyikan nama saya (Hamba Allah)</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Email (Opsional)</label>
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Contoh: email@gmail.com">
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Tujuan Donasi / Kategori</label>
                                <select name="kategori_donasi" class="form-select form-select-lg" required>
                                    <option value="" selected disabled>-- Pilih Tujuan Donasi --</option>
                                    <optgroup label="Kemanusiaan & Sosial">
                                        <option value="bencana_alam" {{ request('kategori') == 'bencana_alam' ? 'selected' : '' }}>🌋 Bencana Alam & Darurat</option>
                                        <option value="pangan_gizi" {{ request('kategori') == 'pangan_gizi' ? 'selected' : '' }}>🍚 Rice Bowl & Sembako (Pangan)</option>
                                        <option value="infrastruktur" {{ request('kategori') == 'infrastruktur' ? 'selected' : '' }}>🕌 Pembangunan Masjid & Infrastruktur</option>
                                        <option value="ekonomi" {{ request('kategori') == 'ekonomi' ? 'selected' : '' }}>💰 Pemberdayaan Ekonomi Dhuafa</option>
                                    </optgroup>
                                    <option value="lainnya" {{ request('kategori') == 'lainnya' ? 'selected' : '' }}>❤️ Donasi Umum Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Pesan / Doa</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Tulis pesan semangat atau doa..."></textarea>
                            </div>

                            <div class="alert alert-warning d-flex align-items-center mb-4">
                                <i class="fas fa-wallet fa-2x me-3"></i>
                                <div>
                                    Total yang harus ditransfer:<br>
                                    <strong class="fs-5">Rp {{ number_format(request('harga'), 0, ',', '.') }}</strong><br>
                                    <small>Ke BCA 123-456-7890 a.n Yayasan Peduli Sesama</small>
                                </div>
                            </div>

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