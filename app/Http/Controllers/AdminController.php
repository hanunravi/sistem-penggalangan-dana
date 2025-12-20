<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi; // PENTING: Panggil Model Donasi

class AdminController extends Controller
{
    public function index()
    {
        // 1. Ambil data donasi dari yang terbaru
        $donasi = Donasi::latest()->get();

        // 2. Kirim data ke view admin/dashboard.blade.php
        return view('admin.dashboard', compact('donasi'));
    }

    public function approveDonation($id)
    {
    // Cari data donasi
    $donasi = Donasi::findOrFail($id);
    
    // Ubah status jadi approved
    $donasi->status = 'approved';
    $donasi->save();

    // Kembali ke halaman sebelumnya dengan pesan sukses
    return redirect()->back()->with('success', 'Donasi berhasil diterima!');
    }
}

