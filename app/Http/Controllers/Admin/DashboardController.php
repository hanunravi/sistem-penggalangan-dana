<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Data Statistik (Kartu Atas)
        $totalDonasi = DB::table('donations')->where('status', 'approved')->sum('amount');
        $jumlahDonatur = DB::table('donations')->count();
        $donasiPending = DB::table('donations')->where('status', 'pending')->count();

        // 2. Data Tabel (Donasi Terbaru)
        // Ini yang sebelumnya kurang, makanya tabel mungkin kosong/error
        $recentDonations = DB::table('donations')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('totalDonasi', 'jumlahDonatur', 'donasiPending', 'recentDonations'));
    }
}