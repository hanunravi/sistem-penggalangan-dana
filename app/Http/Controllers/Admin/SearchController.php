<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Campaign;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('q');

        // Jika keyword kosong, kembalikan ke dashboard
        if (!$keyword) {
            return redirect()->route('admin.dashboard');
        }

        // 1. Cari di Donasi (Nama Donatur atau Email)
        $donasi = Donasi::where('donatur_name', 'LIKE', "%{$keyword}%")
                    ->orWhere('email', 'LIKE', "%{$keyword}%")
                    ->latest()
                    ->take(10)
                    ->get();

        // 2. Cari di Campaign (Judul)
        $campaigns = Campaign::where('title', 'LIKE', "%{$keyword}%")
                        ->latest()
                        ->take(5)
                        ->get();

        // 3. Cari di Post/Berita (Judul)
        $posts = Post::where('title', 'LIKE', "%{$keyword}%")
                    ->latest()
                    ->take(5)
                    ->get();

        return view('admin.search.index', compact('donasi', 'campaigns', 'posts', 'keyword'));
    }
}