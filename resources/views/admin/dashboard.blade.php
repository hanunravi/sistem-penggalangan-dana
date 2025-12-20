@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
            <!-- 2. Isi Halaman (Body) -->
            <div class="hk-pg-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab_block_1">
                        
                        {{-- BARIS 1: KARTU STATISTIK (4 Kotak Atas) --}}
                        <div class="row mb-4">
                            
                            <!-- Kartu 1: Total Dana -->
                            <div class="col-xxl-3 col-md-6 mb-3">
                                <div class="card card-border h-100 bg-primary text-white border-0 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="text-white">Total Dana Terkumpul</h6>
                                        <h3 class="text-white mt-2 fw-bold">Rp {{ number_format($totalDonasi ?? 0, 0, ',', '.') }}</h3>
                                        <span class="fs-7 opacity-75">Akumulasi semua kategori</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kartu 2: Total Donatur -->
                            <div class="col-xxl-3 col-md-6 mb-3">
                                <div class="card card-border h-100 bg-success text-white border-0 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="text-white">Total Orang Baik</h6>
                                        <h3 class="text-white mt-2 fw-bold">{{ number_format($jumlahDonatur ?? 0) }}</h3>
                                        <span class="fs-7 opacity-75">Donatur yang berpartisipasi</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kartu 3: Menunggu Verifikasi -->
                            <div class="col-xxl-3 col-md-6 mb-3">
                                <div class="card card-border h-100 bg-warning text-white border-0 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="text-white">Perlu Verifikasi</h6>
                                        <h3 class="text-white mt-2 fw-bold">{{ number_format($donasiPending ?? 0) }}</h3>
                                        <span class="fs-7 opacity-75">Transaksi pending (Cek segera!)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kartu 4: Campaign Aktif -->
                            <div class="col-xxl-3 col-md-6 mb-3">
                                <div class="card card-border h-100 bg-dark text-white border-0 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="text-white">Campaign Aktif</h6>
                                        <h3 class="text-white mt-2 fw-bold">3</h3>
                                        <span class="fs-7 opacity-75">Program donasi berjalan</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- BARIS 2: GRAFIK & TARGET --}}
                        <div class="row">                           
                            <div class="col-xxl-9 col-lg-8 col-md-7 mb-md-4 mb-3">
                                <div class="card card-border mb-0 h-100">
                                    <div class="card-header card-header-action">
                                        <h6>Statistik Pemasukan Bulanan ({{ date('Y') }})</h6>
                                    </div>
                                    <div class="card-body">
                                        {{-- Container Grafik --}}
                                        <div style="position: relative; height: 300px; width: 100%;">
                                            {{-- Canvas ini akan digambar oleh Script di bawah --}}
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xxl-3 col-lg-4 col-md-5 mb-md-4 mb-3">
                                <div class="card card-border mb-0 h-100">
                                    <div class="card-header card-header-action">
                                        <h6>Ringkasan Status</h6>
                                    </div>
                                    <div class="card-body">
                                        
                                        {{-- Bagian Teks Ringkasan --}}
                                        <div class="mt-4 px-3">
                                            <div class="mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                                                <div>
                                                    <span class="badge bg-primary badge-dot me-2"></span>
                                                    <span class="fw-medium">Dana Terkumpul</span>
                                                </div>
                                                <span class="fw-bold text-dark">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</span>
                                            </div>

                                            <div class="mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                                                <div>
                                                    <span class="badge bg-warning badge-dot me-2"></span>
                                                    <span class="fw-medium">Pending (Jml)</span>
                                                </div>
                                                <span class="fw-bold text-dark">{{ $donasiPending }} Transaksi</span>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="badge bg-success badge-dot me-2"></span>
                                                    <span class="fw-medium">Total Donatur</span>
                                                </div>
                                                <span class="fw-bold text-dark">{{ $jumlahDonatur }} Orang</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @push('scripts') --}} 
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // Ambil data dari Controller
                                var labelBulan = @json($labelBulan); 
                                var dataBulanan = @json($dataBulanan); 

                                var ctx = document.getElementById("myAreaChart").getContext('2d');
                                var myLineChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: labelBulan,
                                        datasets: [{
                                            label: "Pemasukan",
                                            tension: 0.3, // Garis melengkung halus
                                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                                            borderColor: "rgba(78, 115, 223, 1)",
                                            pointRadius: 3,
                                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                            pointBorderColor: "rgba(78, 115, 223, 1)",
                                            pointHoverRadius: 3,
                                            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                            pointHitRadius: 10,
                                            pointBorderWidth: 2,
                                            data: dataBulanan,
                                        }],
                                    },
                                    options: {
                                        maintainAspectRatio: false,
                                        layout: {
                                            padding: { left: 10, right: 25, top: 25, bottom: 0 }
                                        },
                                        scales: {
                                            x: {
                                                grid: { display: false, drawBorder: false },
                                                ticks: { maxTicksLimit: 7 }
                                            },
                                            y: {
                                                ticks: {
                                                    maxTicksLimit: 5,
                                                    padding: 10,
                                                    callback: function(value) {
                                                        return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                                    }
                                                },
                                                grid: { color: "#eaecf4", drawBorder: false, borderDash: [2] }
                                            },
                                        },
                                        plugins: {
                                            legend: { display: false },
                                            tooltip: {
                                                callbacks: {
                                                    label: function(context) {
                                                        return ' Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                        {{-- @endpush --}}

                        {{-- BARIS 3: TABEL DONASI TERBARU --}}
                        <div class="row">
                            <div class="col-md-12 mb-md-4 mb-3">
                                <div class="card card-border mb-0 h-100">
                                    
                                    {{-- Header Tabel --}}
                                    <div class="card-header card-header-action">
                                        <h6>Donasi Terbaru Masuk</h6>
                                        <div class="card-action-wrap">
                                            <a href="#" class="btn btn-sm btn-primary">Lihat Semua Data</a>
                                        </div>
                                    </div>

                                    {{-- Body Tabel --}}
                                    <div class="card-body p-0">
                                        {{-- KODE NOTIFIKASI DI SINI --}}
                                        @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                                                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif

                                        @if(session('error'))
                                            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                                                <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                        {{-- BATAS AKHIR KODE NOTIFIKASI --}}
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th class="ps-4">No</th>
                                                        <th>Nama Donatur</th>
                                                        <th>Kategori</th>
                                                        <th>Nominal</th>
                                                        <th>Tanggal</th>
                                                        <th>Status</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- LOOPING DATA DONASI --}}
                                                    @forelse($recentDonations ?? [] as $donasi)
                                                    <tr>
                                                        <td class="ps-4">{{ $loop->iteration }}</td>
                                                        
                                                        {{-- Kolom Nama & Pesan --}}
                                                        <td>
                                                            <div class="media align-items-center">
                                                                <div class="media-head me-3">
                                                                    <div class="avatar avatar-xs avatar-rounded bg-light text-primary d-flex align-items-center justify-content-center fw-bold">
                                                                        {{-- Inisial Nama --}}
                                                                        {{ substr($donasi->donatur_name ?? 'H', 0, 1) }}
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="text-high-em fw-bold">{{ $donasi->donatur_name ?? 'Hamba Allah' }}</div> 
                                                                    <div class="fs-8 text-muted text-truncate" style="max-width: 150px;">
                                                                        {{ Str::limit($donasi->message ?? 'Tidak ada pesan', 30) }}
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </td>

                                                        {{-- Kolom Kategori --}}
                                                       <td>
                                                            @if($donasi->campaign_id && $donasi->campaign)
                                                                
                                                                {{-- Jika Donasi via Campaign: Tampilkan Judul Campaign --}}
                                                                <div class="fw-bold text-primary" style="line-height: 1.2;">
                                                                    {{ $donasi->campaign->judul ?? $donasi->campaign->title ?? 'Campaign Tak Ditemukan' }}
                                                                </div>
                                                                <small class="text-muted" style="font-size: 0.75rem;">
                                                                    <i class="fas fa-bullhorn me-1"></i>Campaign
                                                                </small>

                                                            @else
                                                                
                                                                {{-- Jika Donasi Biasa: Tampilkan Kategori Donasi --}}
                                                                <div class="fw-bold">
                                                                    {{ ucfirst($donasi->kategori_donasi) }}
                                                                </div>

                                                            @endif

                                                            {{-- LOGIKA 2: Jenis Donasi (Manual vs Paket) - Tetap Dipertahankan --}}
                                                            <div class="mt-1">
                                                                @if($donasi->jenis_donasi == 'paket')
                                                                    <small class="badge bg-info text-white">
                                                                        <i class="fas fa-box me-1"></i> {{ $donasi->nama_paket }}
                                                                    </small>
                                                                @else
                                                                    <small class="badge bg-secondary text-white">Manual</small>
                                                                @endif
                                                            </div>
                                                        </td>

                                                        {{-- Kolom Nominal --}}
                                                        <td>
                                                            <span class="fw-bold text-dark">Rp {{ number_format($donasi->amount, 0, ',', '.') }}</span>
                                                        </td>

                                                        {{-- Kolom Tanggal --}}
                                                        <td>{{ date('d M Y', strtotime($donasi->created_at)) }}</td>

                                                        {{-- Kolom Status --}}
                                                        <td>
                                                            @if($donasi->status == 'approved')
                                                                {{-- SUKSES: Paksa teks jadi Putih --}}
                                                                <span class="badge bg-success" style="color: white !important;">Berhasil</span>
                                                            
                                                            @elseif($donasi->status == 'pending')
                                                                {{-- PENDING: Paksa teks jadi Hitam Pekat (#000) agar kontras dengan warna kuning --}}
                                                                <span class="badge bg-warning" style="color: #000000 !important;">Pending</span>
                                                            
                                                            @else
                                                                {{-- DITOLAK: Paksa teks jadi Putih --}}
                                                                <span class="badge bg-danger" style="color: white !important;">Ditolak</span>
                                                            @endif
                                                        </td>

                                                        {{-- Kolom Aksi --}}
                                                       <td class="text-center">  
                                                            <button type="button" class="btn btn-primary btn-sm" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#modalDetail{{ $donasi->id }}">
                                                                Lihat Bukti
                                                            </button>
                                                            </div>
                                                        </td>
                                                    {{-- ========================================== --}}
                                                    {{-- MODAL DETAIL (POPUP) --}}
                                                    {{-- ========================================== --}}
                                                    <div class="modal fade" id="modalDetail{{ $donasi->id }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Verifikasi Bukti Transfer</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    
                                                                    {{-- 1. FOTO BUKTI TRANSFER --}}
                                                                    <div class="text-center mb-3 p-2 bg-light border rounded">
                                                                        @if($donasi->payment_proof)
                                                                           <img src="{{ asset('storage/payment_proof/' . $donasi->payment_proof) }}" 
                                                                            class="img-fluid rounded" 
                                                                            style="max-height: 400px; object-fit: contain;" 
                                                                            alt="Bukti Transfer">>
                                                                        @else
                                                                            <div class="py-4 text-muted">
                                                                                <i class="fa fa-image fa-3x mb-2"></i><br>
                                                                                Tidak ada bukti upload
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    {{-- 2. INFO DONATUR --}}
                                                                    <div class="mb-3">
                                                                        <label class="small text-muted fw-bold">Nama Pengirim:</label>
                                                                        <div class="fs-6">{{ $donasi->donatur_name ?? 'Hamba Allah' }}</div>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="small text-muted fw-bold">Nominal:</label>
                                                                        <div class="fs-5 text-primary fw-bold">Rp {{ number_format($donasi->amount, 0, ',', '.') }}</div>
                                                                    </div>

                                                                    <hr>

                                                                    {{-- 3. TOMBOL AKSI (TERIMA / TOLAK / HAPUS) --}}
                                                                    <div class="d-grid gap-2">
                                                                        @if($donasi->status == 'pending')
                                                                            <div class="row g-2">
                                                                                <div class="col-6">
                                                                                    {{-- Tombol TERIMA --}}
                                                                                    <form action="{{ route('admin.donasi.approve', $donasi->id) }}" method="POST">
                                                                                        @csrf @method('PATCH')
                                                                                        <button type="submit" class="btn btn-success w-100">
                                                                                            <i class="fa fa-check"></i> Terima
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    {{-- Tombol TOLAK --}}
                                                                                    <form action="{{ route('admin.donasi.reject', $donasi->id) }}" method="POST">
                                                                                        @csrf @method('PATCH')
                                                                                        <button type="submit" class="btn btn-warning w-100" onclick="return confirm('Yakin tolak?')">
                                                                                            <i class="fa fa-times"></i> Tolak
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <div class="alert alert-info text-center py-2 mb-0">
                                                                                Status saat ini: <strong>{{ ucfirst($donasi->status) }}</strong>
                                                                            </div>
                                                                        @endif

                                                                        {{-- Tombol HAPUS (Selalu muncul) --}}
                                                                        <form action="{{ route('admin.donasi.delete', $donasi->id) }}" method="POST" class="mt-2">
                                                                            @csrf @method('DELETE')
                                                                            <button type="submit" class="btn btn-outline-danger w-100 btn-sm" onclick="return confirm('Yakin hapus permanen?')">
                                                                                <i class="fa fa-trash me-1"></i> Hapus Data
                                                                            </button>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center py-5">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="fas fa-box-open fa-3x text-muted mb-3 opacity-50"></i>
                                                                <h6 class="text-muted">Belum ada data donasi terbaru.</h6>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Page Body -->
            
        </div>
    </div>
    <!-- /Main Content -->

@endsection