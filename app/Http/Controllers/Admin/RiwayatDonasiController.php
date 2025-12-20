<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donasi; // Pastikan Model Donasi di-import
use Illuminate\Support\Facades\DB; // Untuk fungsi hitung total (SUM/RAW)

class RiwayatDonasiController extends Controller
{
    // ==========================================================
    // 1. HALAMAN DONASI MASUK (Semua Transaksi)
    // ==========================================================
    public function index()
    {
        // Ambil semua data donasi, urutkan dari yang terbaru
        // Menggunakan paginate(10) agar per halaman isi 10 baris
        $donasi = Donasi::orderBy('created_at', 'desc')->paginate(10);

        // Kirim ke View: admin/donasi/index.blade.php
        return view('admin.donasi.index', compact('donasi'));
    }

    // ==========================================================
    // 2. HALAMAN DATA DONATUR (Rekap Orang)
    // ==========================================================
    public function donatur()
    {
        // Ambil data donatur unik berdasarkan Nama, Email, dan 
        // Hitung total uang yang disumbangkan (hanya yang status approved)
        $donatur = Donasi::select('donatur_name', 'email', DB::raw('SUM(amount) as total_donasi'))
                    ->where('status', 'approved') 
                    ->groupBy('donatur_name', 'email')
                    ->orderBy('total_donasi', 'desc')
                    ->paginate(10);

        // Kirim ke View: admin/donatur/index.blade.php
        return view('admin.donatur.index', compact('donatur'));
    }
}