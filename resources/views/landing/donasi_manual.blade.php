@extends('layouts.front')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="page-banner-section fix section-padding" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                    
                    {{-- [PERUBAHAN 1] Bagian Header --}}
                    <div class="card-header bg-success text-white text-center py-4" style="border-radius: 20px 20px 0 0;">
                        @if(isset($campaign) && $campaign)
                            <h3><i class="fas fa-hand-holding-heart me-2"></i>Donasi: {{ $campaign->nama_campaign }}</h3>
                        @else
                            <h3><i class="fas fa-hand-holding-usd me-2"></i>Formulir Donasi Sukarela</h3>
                        @endif
                    </div>

                    <div class="card-body p-5">
                        
                        {{-- Alert Sukses --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Alhamdulillah!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Alert Error --}}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="manualDonationForm" action="{{ route('donasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            {{-- [PERUBAHAN 2] Bagian Input Hidden ID (PENTING) --}}
                            @if(isset($campaign) && $campaign)
                                <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                            @else
                                <input type="hidden" name="campaign_id" value="0">
                            @endif

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Mau Donasi Berapa?</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light fw-bold">Rp</span>
                                    <input type="number" name="amount" class="form-control" placeholder="Min: 10.000" min="10000" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Tujuan Donasi</label>
                                <select name="kategori_donasi" class="form-select form-select-lg">
                                    <option value="umum">❤️ Donasi Umum</option>
                                    <option value="bencana">🌋 Bencana Alam</option>
                                    <option value="kemanusiaan">🤝 Kemanusiaan</option>
                                    <option value="pendidikan">🎓 Pendidikan</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Nama Donatur</label>
                                <input type="text" name="donatur_name" id="inputNama" class="form-control form-control-lg" required>
                                
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_anonymous" id="anonimCheck" value="1">
                                    <label class="form-check-label" for="anonimCheck">Sembunyikan nama (Hamba Allah)</label>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="fw-bold mb-2">Email (Opsional)</label>
                                <input type="email" name="email" class="form-control" placeholder="Contoh: nama@email.com">
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Pesan / Doa</label>
                                <textarea name="message" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-2">Upload Bukti Transfer</label>
                                <input type="file" name="payment_proof" class="form-control form-control-lg" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg w-100 py-3">Kirim Donasi</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            Swal.fire({
                title: 'Alhamdulillah!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#198754'
            });
        @endif

        var checkbox = document.getElementById('anonimCheck');
        var inputNama = document.getElementById('inputNama');
        
        if(checkbox) {
            checkbox.addEventListener('change', function() {
                if(this.checked) {
                    inputNama.value = 'Hamba Allah';
                    inputNama.readOnly = true;
                } else {
                    inputNama.value = '';
                    inputNama.readOnly = false;
                }
            });
        }
    });
</script>

@endsection