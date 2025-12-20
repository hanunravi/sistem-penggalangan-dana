<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Campaign;
use App\Models\Post; 


class LandingController extends Controller
{
    public function index()
    {
        try {
            // --- A. Statistik & Donasi ---
            $totalUang = DB::table('donations')->where('status', 'approved')->sum('amount');
            $totalDonatur = DB::table('donations')->where('status', 'approved')->count();

            $donaturTerbaru = DB::table('donations')
                ->where('status', 'approved')
                ->orderBy('created_at', 'desc')
                ->limit(4)
                ->get();

            // --- B. Campaign ---
            $campaigns = Campaign::latest()->get();

            // --- C. Kabar Lapangan (Post) ---
            $posts = Post::latest()->limit(6)->get();

            // Kirim semua data ke view
            return view('landing.home', compact(
                'totalUang', 
                'totalDonatur', 
                'donaturTerbaru', 
                'campaigns', 
                'posts' 
            ));

        } catch (\Exception $e) {
            return view('landing.home', [
                'totalUang' => 0,
                'totalDonatur' => 0,
                'donaturTerbaru' => [],
                'campaigns' => [],
                'posts' => [] // <--- 4. DATA KOSONG JIKA ERROR
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