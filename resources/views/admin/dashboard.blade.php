@extends('layouts.admin')

@section('title', 'Overview')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Dashboard Statistik</h4>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-stats card-primary">
                <div class="card-body">
                    <p>Total Donasi</p>
                    <h3>Rp 150.000.000</h3>
                </div>
            </div>
        </div>
        {{-- Widget lainnya --}}
    </div>
@endsection

{{-- Jika butuh Chart.js khusus halaman ini --}}
@push('scripts')
    <script>
        // Script Chart JS disini
    </script>
@endpush