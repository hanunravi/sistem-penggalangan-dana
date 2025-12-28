@extends('layouts.admin')

@section('title', 'Dashboard Donasi')

@section('content')
    <!-- Page Header -->
    <div class="hk-pg-header pg-header-wth-tab pt-7">
        <div class="d-flex">
            <div class="d-flex flex-wrap justify-content-between flex-1">
                <div class="mb-lg-0 mb-2 me-8">
                    <h1 class="pg-title">Dashboard Donasi</h1>
                    <p>Ringkasan statistik penerimaan donasi dan aktivitas terbaru.</p>
                </div>
                <div class="pg-header-action-wrap">
                    <div class="input-group w-300p">
                        <span class="input-affix-wrapper">
                            <span class="input-prefix">
                                <span class="feather-icon"><i data-feather="calendar"></i></span>
                            </span>
                            <input class="form-control form-wth-icon" name="datetimes" value="{{ date('d F Y') }}" readonly>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- Page Body -->
    <div class="hk-pg-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab_block_1">
                
                <!-- Row 1: Statistik & Grafik -->
                <div class="row">
                    <div class="col-xxl-9 col-lg-8 col-md-7 mb-md-4 mb-3">
                        <div class="card card-border mb-0 h-100">
                            <div class="card-header card-header-action">
                                <h6>Statistik Pemasukan (Tahun {{ date('Y') }})</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <div class="d-inline-block">
                                        <span class="badge-status">
                                            <span class="badge bg-primary badge-indicator badge-indicator-nobdr"></span>
                                            <span class="badge-label">Total Donasi Sukses</span>
                                        </span>
                                    </div>
                                </div>
                                <div style="height: 300px;">
                                    <canvas id="donation_chart"></canvas>
                                </div>
                                
                                <div class="separator-full mt-5"></div>
                                
                                <div class="flex-grow-1 ms-lg-3 mt-4">
                                    <div class="row">
                                        <div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
                                            <span class="d-block fw-medium fs-7">Total Terkumpul</span>
                                            <div class="d-flex align-items-center">
                                                <span class="d-block fs-5 fw-medium text-dark mb-0">
                                                    Rp {{ number_format($totalDonasi, 0, ',', '.') }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
                                            <span class="d-block fw-medium fs-7">Total Transaksi</span>
                                            <div class="d-flex align-items-center">
                                                <span class="d-block fs-4 fw-medium text-dark mb-0">{{ $jumlahDonatur }}</span>
                                                <small class="text-muted ms-2">x</small>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
                                            <span class="d-block fw-medium fs-7">Menunggu Pembayaran</span>
                                            <div class="d-flex align-items-center">
                                                <span class="d-block fs-4 fw-medium text-dark mb-0">{{ $donasiPending }}</span>
                                                <span class="badge badge-sm badge-soft-warning ms-1">Pending</span>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-sm-6">
                                            <span class="d-block fw-medium fs-7">Program Aktif</span>
                                            <div class="d-flex align-items-center">
                                                <span class="d-block fs-4 fw-medium text-dark mb-0">{{ $campaignCount }}</span>
                                                <small class="text-muted ms-2">Campaign</small>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Kolom Kanan: Donut Chart -->
                    <div class="col-xxl-3 col-lg-4 col-md-5 mb-md-4 mb-3">
                        <div class="card card-border mb-0 h-100">
                            <div class="card-header card-header-action">
                                <h6>Ringkasan Status</h6>
                            </div>
                            <div class="card-body text-center d-flex flex-column justify-content-center">
                                <div style="height: 200px; position: relative;">
                                    <canvas id="status_chart"></canvas>
                                </div>
                                <div class="mt-4 text-start">
                                    <div class="mb-3">
                                        <span class="d-block badge-status lh-1">
                                            <span class="badge bg-success badge-indicator badge-indicator-nobdr d-inline-block"></span>
                                            <span class="badge-label d-inline-block">Berhasil</span>
                                        </span>
                                        <span class="d-block text-dark fs-5 fw-medium mb-0 mt-1">{{ $jumlahDonatur }}</span>
                                    </div>
                                    <div>
                                        <span class="d-block badge-status lh-1">
                                            <span class="badge bg-warning badge-indicator badge-indicator-nobdr d-inline-block"></span>
                                            <span class="badge-label d-inline-block">Pending</span>
                                        </span>
                                        <span class="d-block text-dark fs-5 fw-medium mb-0 mt-1">{{ $donasiPending }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Row 2: Tabel Donasi Terbaru -->
                <div class="row">
                    <div class="col-md-12 mb-md-4 mb-3">
                        <div class="card card-border mb-0 h-100">
                            <div class="card-header card-header-action">
                                <h6>Donasi Terbaru <span class="badge badge-sm badge-light ms-1">{{ count($recentDonations) }}</span></h6>
                                <div class="card-action-wrap">
                                    <a href="{{ route('admin.donasi.index') }}" class="btn btn-sm btn-outline-light">Lihat Semua</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Donatur</th>
                                                <th>Kategori</th>
                                                <th>Nominal</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentDonations as $d)
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="media-head me-2">
                                                            <div class="avatar avatar-xs avatar-rounded">
                                                                <span class="avatar-initial bg-soft-primary text-primary">
                                                                    {{ substr($d->donatur_name, 0, 1) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-high-em fw-bold">{{ $d->donatur_name }}</div>
                                                            <div class="fs-7 text-muted">{{ $d->is_anonymous ? 'Hamba Allah' : ($d->email ?? '-') }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($d->nama_paket)
                                                        <span class="badge badge-soft-info">{{ $d->nama_paket }}</span>
                                                    @else
                                                        <span class="badge badge-soft-secondary">Manual</span>
                                                    @endif
                                                </td>
                                                <td class="fw-bold text-success">
                                                    Rp {{ number_format($d->amount, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    @if($d->status == 'approved')
                                                        <span class="badge badge-success">Sukses</span>
                                                    @elseif($d->status == 'pending')
                                                        <span class="badge badge-warning">Pending</span>
                                                    @else
                                                        <span class="badge badge-danger">Gagal</span>
                                                    @endif
                                                </td>
                                                <td>{{ $d->created_at->format('d M Y') }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center p-3 text-muted">Belum ada donasi hari ini.</td>
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
@endsection

@push('scripts')
{{-- PENTING: LIBRARY CHART JS HARUS DI-LOAD DI SINI --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- 1. CHART DONASI (Line Chart) ---
        const ctxDonasi = document.getElementById('donation_chart');
        
        if (ctxDonasi) {
            const labelBulan = {!! json_encode($labelBulan) !!};
            const dataBulanan = {!! json_encode($dataBulanan) !!};

            new Chart(ctxDonasi, {
                type: 'line',
                data: {
                    labels: labelBulan,
                    datasets: [{
                        label: 'Pemasukan (Rp)',
                        data: dataBulanan,
                        borderColor: '#007D88', // Warna Teal Jampack
                        backgroundColor: 'rgba(0, 125, 136, 0.1)',
                        borderWidth: 2,
                        tension: 0.3, 
                        fill: true,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Rp ' + context.raw.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { borderDash: [2, 4], color: '#e9ecef' }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });
        }

        // --- 2. CHART STATUS (Doughnut) ---
        const ctxStatus = document.getElementById('status_chart');
        
        if (ctxStatus) {
            const jumlahSukses = {{ $jumlahDonatur }};
            const jumlahPending = {{ $donasiPending }};

            new Chart(ctxStatus, {
                type: 'doughnut',
                data: {
                    labels: ['Berhasil', 'Pending'],
                    datasets: [{
                        data: [jumlahSukses, jumlahPending],
                        backgroundColor: ['#28a745', '#FFC107'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%', 
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        }
    });
</script>
@endpush