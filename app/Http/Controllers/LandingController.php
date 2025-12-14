<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Wajib ada untuk Query
use Carbon\Carbon;

class LandingController extends Controller
{
    public function index()
    {
        try {
            // 1. Coba Ambil Data Statistik dari Database
            // Menggunakan query builder agar lebih ringan
            $totalUang = DB::table('donations')->where('status', 'approved')->sum('amount');
            $totalDonatur = DB::table('donations')->where('status', 'approved')->count();

            // 2. Coba Ambil 4 Donatur Terakhir
            $donaturTerbaru = DB::table('donations')
                ->where('status', 'approved')
                ->orderBy('created_at', 'desc')
                ->limit(4)
                ->get();

            // Kirim data ke view
            return view('landing.home', compact('totalUang', 'totalDonatur', 'donaturTerbaru'));

        } catch (\Exception $e) {
            // JIKA DATABASE ERROR (Belum migrate / Tabel tidak ada)
            // Website tetap jalan dengan data kosong (0) agar tidak crash
            
            return view('landing.home', [
                'totalUang' => 0,
                'totalDonatur' => 0,
                'donaturTerbaru' => []
            ]);
        }
    }
}