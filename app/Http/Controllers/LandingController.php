<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Donasi;   // Model Donasi kita
use App\Models\Campaign; // Pastikan Model ini ada
use App\Models\Post;     // Pastikan Model ini ada

class LandingController extends Controller
{
    public function index()
    {
        try {
            // --- A. Statistik & Donasi ---
            // Menggunakan Model Donasi agar sesuai dengan tabel 'donasis' di Laravel
            // Filter status: 'approved' (sesuai settingan Midtrans Callback kita)
            
            $totalUang = Donasi::where('status', 'approved')->sum('amount');
            $totalDonatur = Donasi::where('status', 'approved')->count();

            $donaturTerbaru = Donasi::where('status', 'approved')
                ->latest() // order by created_at desc
                ->take(4)  // limit 4
                ->get();

            // --- B. Campaign (Program Donasi) ---
            // Mengambil campaign jika modelnya ada, jika error kosongkan
            try {
                $campaigns = Campaign::latest()->get();
            } catch (\Exception $e) {
                $campaigns = collect(); // Kosong jika tabel belum ada
            }

            // --- C. Kabar Lapangan (Post/Berita) ---
            try {
                $posts = Post::latest()->take(6)->get();
            } catch (\Exception $e) {
                $posts = collect(); // Kosong jika tabel belum ada
            }

            // Kirim semua data ke view
            // NOTE: Pastikan file view ada di resources/views/landing/home.blade.php
            // Kalau file abang di 'front', ganti jadi 'front.home'
            return view('landing.home', compact(
                'totalUang', 
                'totalDonatur', 
                'donaturTerbaru', 
                'campaigns', 
                'posts' 
            ));

        } catch (\Exception $e) {
            // Error Handling: Jika database error, website tetap jalan tapi data kosong
            return view('landing.home', [
                'totalUang' => 0,
                'totalDonatur' => 0,
                'donaturTerbaru' => [],
                'campaigns' => [],
                'posts' => [] 
            ]);
        }
    }

    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('landing.detail_campaign', compact('campaign'));
    }

    public function caraKerja()
    {
        return view('landing.cara-kerja');
    }

    public function campaign()
    {
        $campaigns = Campaign::latest()->get();
        return view('landing.campaign', compact('campaigns'));
    }

    public function kontak()
    {
        return view('landing.kontak');
    }
}