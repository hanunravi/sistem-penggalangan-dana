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

                        {{-- BARIS 2: GRAFIK & TARGET (Placeholder Layout) --}}
                        <div class="row">
                            
                            <!-- Grafik Pemasukan (Kiri) -->
                            <div class="col-xxl-9 col-lg-8 col-md-7 mb-md-4 mb-3">
                                <div class="card card-border mb-0 h-100">
                                    <div class="card-header card-header-action">
                                        <h6>Statistik Pemasukan Bulanan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center d-flex align-items-center justify-content-center" style="min-height: 250px; background: #f9f9f9; border-radius: 8px;">
                                            <div class="text-muted">
                                                <i class="fas fa-chart-bar fa-3x mb-3"></i>
                                                <p>Grafik Donasi (Placeholder)</p>
                                                {{-- Div ini nanti diisi oleh Library Chart JS template --}}
                                                <div id="column_chart_2"></div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Status Transaksi (Kanan) -->
                            <div class="col-xxl-3 col-lg-4 col-md-5 mb-md-4 mb-3">
                                <div class="card card-border mb-0 h-100">
                                    <div class="card-header card-header-action">
                                        <h6>Ringkasan Status</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <div id="radial_chart_2" style="min-height: 200px;"></div>
                                        
                                        <div class="mt-4 text-start px-3">
                                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="badge bg-primary badge-dot me-2"></span>
                                                    <span class="fw-medium">Berhasil</span>
                                                </div>
                                                <span class="fw-bold text-dark">{{ number_format($totalDonasi ?? 0) }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="badge bg-warning badge-dot me-2"></span>
                                                    <span class="fw-medium">Pending</span>
                                                </div>
                                                <span class="fw-bold text-dark">{{ number_format($donasiPending ?? 0) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  

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
                                                        <th class="text-end pe-4">Aksi</th>
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
                                                            <span class="badge badge-soft-primary px-3 py-2">
                                                                {{ ucfirst(str_replace('_', ' ', $donasi->kategori_donasi ?? 'Umum')) }}
                                                            </span>
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
                                                                <span class="badge badge-success px-2">Berhasil</span>
                                                            @elseif($donasi->status == 'pending')
                                                                <span class="badge badge-warning text-dark px-2">Pending</span>
                                                            @else
                                                                <span class="badge badge-danger px-2">Ditolak</span>
                                                            @endif
                                                        </td>

                                                        {{-- Kolom Aksi --}}
                                                        <td class="text-end pe-4">
                                                            <div class="d-flex justify-content-end align-items-center gap-2">
                                                                {{-- Tombol Lihat Detail --}}
                                                                <a href="#" class="btn btn-icon btn-light btn-rounded btn-sm" data-bs-toggle="tooltip" title="Lihat Detail">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                
                                                                {{-- Tombol Verifikasi (Hanya jika pending) --}}
                                                                @if($donasi->status == 'pending')
                                                                <a href="#" class="btn btn-icon btn-success btn-rounded btn-sm" data-bs-toggle="tooltip" title="Terima">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                @endif
                                                            </div>
                                                        </td>
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