<!--<< All JS Plugins >>-->
<script src="{{ asset('assets/landing/js/jquery-3.7.1.min.js') }}"></script>
<!--<< Viewport Js >>-->
<script src="{{ asset('assets/landing/js/viewport.jquery.js') }}"></script>
<!--<< Bootstrap Js >>-->
<script src="{{ asset('assets/landing/js/bootstrap.bundle.min.js') }}"></script>
<!--<< Nice Select Js >>-->
<script src="{{ asset('assets/landing/js/jquery.nice-select.min.js') }}"></script>
<!--<< Waypoints Js >>-->
<script src="{{ asset('assets/landing/js/jquery.waypoints.js') }}"></script>
<!--<< Counterup Js >>-->
<script src="{{ asset('assets/landing/js/jquery.counterup.min.js') }}"></script>
<!--<< Swiper Slider Js >>-->
<script src="{{ asset('assets/landing/js/swiper-bundle.min.js') }}"></script>
<!--<< MeanMenu Js >>-->
<script src="{{ asset('assets/landing/js/jquery.meanmenu.min.js') }}"></script>
<!--<< Magnific Popup Js >>-->
<script src="{{ asset('assets/landing/js/jquery.magnific-popup.min.js') }}"></script>
<!--<< Wow Animation Js >>-->
<script src="{{ asset('assets/landing/js/wow.min.js') }}"></script>
<!--<< Circle Progress Js >>-->
<script src="{{ asset('assets/landing/js/circle-progress.js') }}"></script>
<!--<< Main.js (Bawaan Template) >>-->
<script src="{{ asset('assets/landing/js/main.js') }}"></script>


<!--<< donasi manual script >>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@php
    $clientKey = env('MIDTRANS_CLIENT_KEY');
    $isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN);
    $snapUrl = $isProduction 
        ? 'https://app.midtrans.com/snap/snap.js' 
        : 'https://app.sandbox.midtrans.com/snap/snap.js';
@endphp

@if(!empty($clientKey))
    <script src="{{ $snapUrl }}" data-client-key="{{ $clientKey }}"></script>
    <script>
        console.log("Midtrans Frontend Loaded.");
        console.log("Mode: {{ $isProduction ? 'PRODUCTION' : 'SANDBOX' }}");
    </script>
@endif

<script>
    // 1. Tampilkan Alert Sukses Session
    @if(session('success'))
        Swal.fire({
            title: 'Alhamdulillah!',
            text: {!! json_encode(session('success')) !!}, 
            icon: 'success',
            confirmButtonText: 'Tutup',
            confirmButtonColor: '#198754'
        });
    @endif

    // 2. Logika Checkbox Anonim
    const checkbox = document.getElementById('anonimCheck');
    const inputNama = document.getElementById('inputNama');
    if(checkbox && inputNama) {
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

    // 3. FUNGSI UTAMA PROSES DONASI
    function processDonation() {
        const form = document.getElementById('donationForm');
        const submitBtn = document.getElementById('submitBtn');
        
        // A. Cek Validasi Form Dulu
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // B. Cek Snap JS
        if (typeof window.snap === 'undefined') {
            Swal.fire('Error', 'Sistem pembayaran belum siap (Script tidak terload). Cek koneksi internet atau refresh halaman.', 'error');
            return;
        }

        // Button Loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Memproses...';

        const formData = new FormData(form);
        // Tambahkan metode pembayaran midtrans secara eksplisit
        formData.append('payment_method', 'midtrans');

        fetch("{{ route('donasi.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => { throw new Error(text) });
            }
            return response.json();
        })
        .then(data => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-qrcode me-2"></i> Lanjut Pembayaran (Otomatis)';

            if(data.snap_token) {
                // BUKA POPUP MIDTRANS
                window.snap.pay(data.snap_token, {
                    onSuccess: function(result){
                        Swal.fire('Berhasil!', 'Pembayaran berhasil!', 'success').then(() => {
                            window.location.href = "{{ url('/') }}";
                        });
                    },
                    onPending: function(result){
                        Swal.fire('Menunggu Pembayaran', 'Silakan selesaikan pembayaran Anda di Popup yang muncul.', 'info').then(() => {
                            window.location.reload();
                        });
                    },
                    onError: function(result){
                        Swal.fire('Gagal!', 'Pembayaran gagal atau dibatalkan.', 'error');
                    },
                    onClose: function(){
                        Swal.fire('Dibatalkan', 'Anda menutup halaman pembayaran sebelum menyelesaikan transaksi.', 'warning');
                    }
                });
            } else {
                Swal.fire('Error', data.message || 'Gagal membuat transaksi.', 'error');
            }
        })
        .catch(error => {
            console.error(error);
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-qrcode me-2"></i> Lanjut Pembayaran (Otomatis)';
            
            let msg = "Terjadi kesalahan sistem.";
            try {
                const errObj = JSON.parse(error.message);
                if(errObj.message) msg = errObj.message;
            } catch(e) {
                if(error.message) msg = error.message;
            }
            
            if(msg.includes('SQL') || msg.includes('html')) msg = "Gagal menghubungi server.";

            Swal.fire('Gagal', msg, 'error');
        });
    }
</script>

<!--<<donasi paket script >>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@php
    $clientKey = env('MIDTRANS_CLIENT_KEY');
    // Pastikan logic environment benar (ikuti controller)
    $isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN);
    $snapUrl = $isProduction 
        ? 'https://app.midtrans.com/snap/snap.js' 
        : 'https://app.sandbox.midtrans.com/snap/snap.js';
@endphp

@if(!empty($clientKey))
    <script src="{{ $snapUrl }}" data-client-key="{{ $clientKey }}"></script>
@endif

<script>
    // 1. AUTO SELECT KATEGORI
    document.addEventListener("DOMContentLoaded", function() {
        const namaPaket = {!! json_encode(request('nama') ?? '') !!}.toLowerCase();
        const urlKategori = "{{ request('kategori') }}";
        const kategoriSelect = document.getElementById('kategoriSelect');

        if(urlKategori) {
            kategoriSelect.value = urlKategori;
        } else {
            // Fallback tebak kategori
            if(namaPaket.includes('sembako') || namaPaket.includes('makan') || namaPaket.includes('beras')) {
                kategoriSelect.value = 'pangan_gizi';
            } else if(namaPaket.includes('sehat') || namaPaket.includes('obat')) {
                kategoriSelect.value = 'medis';
            } else if(namaPaket.includes('sekolah') || namaPaket.includes('pendidikan')) {
                kategoriSelect.value = 'pendidikan';
            } else if(namaPaket.includes('bencana') || namaPaket.includes('tanggap')) {
                kategoriSelect.value = 'bencana_alam';
            }
        }

        // Logic Checkbox Anonim
        const anonimCheck = document.getElementById('anonimCheck');
        const inputNama = document.getElementById('inputNama');
        if(anonimCheck){
            anonimCheck.addEventListener('change', function() {
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

    // 2. FUNGSI BAYAR (Global Scope)
    function bayarSekarang() {
        console.log("Tombol Bayar Diklik..."); 

        const form = document.getElementById('paketForm');
        // PENTING: ID ini harus sama dengan di HTML
        const btn = document.getElementById('btnBayar'); 
        const amount = document.getElementById('inputAmount').value;

        // A. Validasi Form
        if (!form.checkValidity()) {
            form.reportValidity(); 
            return;
        }

        // B. Validasi Harga
        if (!amount || amount < 10000) {
            Swal.fire('Error', 'Nominal paket tidak valid (Min. 10.000). Silakan pilih paket ulang.', 'error');
            return;
        }

        // C. Cek Script Midtrans
        if (typeof window.snap === 'undefined') {
            Swal.fire({
                icon: 'error',
                title: 'Sistem Belum Siap',
                text: 'Koneksi ke Midtrans gagal. Coba refresh halaman atau cek internetmu.'
            });
            return;
        }

        // D. Proses Kirim
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';

        const formData = new FormData(form);

        fetch("{{ route('donasi.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => { throw new Error(text) });
            }
            return response.json();
        })
        .then(data => {
            console.log("Response dari server:", data);
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-qrcode me-2"></i> Bayar Paket Sekarang';

            if(data.snap_token) {
                window.snap.pay(data.snap_token, {
                    onSuccess: function(result){
                        Swal.fire('Berhasil!', 'Pembayaran berhasil diterima.', 'success').then(() => {
                            window.location.href = "{{ url('/') }}";
                        });
                    },
                    onPending: function(result){
                        Swal.fire('Menunggu Pembayaran', 'Silakan selesaikan pembayaran.', 'info').then(() => {
                            window.location.reload();
                        });
                    },
                    onError: function(result){
                        Swal.fire('Gagal', 'Pembayaran gagal.', 'error');
                    },
                    onClose: function(){
                        Swal.fire('Dibatalkan', 'Kamu menutup halaman pembayaran.', 'warning');
                    }
                });
            } else {
                Swal.fire('Error', 'Gagal mendapatkan Token Pembayaran. Coba lagi.', 'error');
            }
        })
        .catch(error => {
            console.error("Error Fetch:", error);
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-qrcode me-2"></i> Bayar Paket Sekarang';
            
            let msg = "Terjadi kesalahan sistem.";
            try {
                const errObj = JSON.parse(error.message);
                if(errObj.message) msg = errObj.message;
            } catch(e) {
                if(error.message) msg = error.message;
            }
            
            Swal.fire('Gagal', msg, 'error');
        });
    }
</script>

