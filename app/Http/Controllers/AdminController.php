<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi; 
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Ambil data donasi terbaru dengan Pagination (10 per halaman)
        $donasi = Donasi::latest()->paginate(10);

        // 2. Hitung Total Donasi yang SUKSES (status 'paid' atau 'approved')
        $totalDonasi = Donasi::whereIn('status', ['paid', 'approved', 'settlement'])->sum('amount');

        // 3. Kirim data ke view
        return view('admin.dashboard', compact('donasi', 'totalDonasi'));
    }

    // Fungsi Approval Manual (Misal untuk Transfer Manual atau Override)
    public function approveDonation($id)
    {
        $donasi = Donasi::findOrFail($id);
        
        // Ubah status jadi 'approved' (Istilah untuk sukses)
        $donasi->status = 'approved';
        $donasi->save();

        return redirect()->back()->with('success', 'Status donasi berhasil diubah menjadi Diterima/Approved!');
    }

    // Fungsi Batalkan Donasi
    public function rejectDonation($id)
    {
        $donasi = Donasi::findOrFail($id);
        
        $donasi->status = 'rejected';
        $donasi->save();

        return redirect()->back()->with('error', 'Donasi ditolak/dibatalkan.');
    }
}