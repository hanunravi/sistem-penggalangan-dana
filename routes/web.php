<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\PostController; 
use App\Http\Controllers\Admin\RiwayatDonasiController;

// ==========================================================
// 1. ROUTE UTAMA (PUBLIC)
// ==========================================================
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/cara-kerja', [LandingController::class, 'caraKerja'])->name('landing.cara-kerja');
Route::get('/campaign', [LandingController::class, 'campaign'])->name('landing.campaign');
Route::get('/kontak', [LandingController::class, 'kontak'])->name('landing.kontak');

/// 1. Halaman List Semua Berita (Arsip)
Route::get('/kabar-lapangan', function() {
    $posts = \App\Models\Post::latest()->paginate(9);
    
    // UBAH DARI 'front.posts.index' MENJADI 'landing.news'
    return view('landing.news', compact('posts')); 
})->name('kabar.index');

// 2. Halaman Baca Detail Berita
Route::get('/kabar-lapangan/{slug}', function($slug) {
    $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
    
    // UBAH DARI 'front.posts.show' MENJADI 'landing.detail_post'
    // Pastikan file detail_post.blade.php sudah ada di folder resources/views/landing/
    return view('landing.detail_post', compact('post')); 
})->name('kabar.show');

Route::get('/campaign/{id}', [LandingController::class, 'show'])->name('campaign.show');

// ==========================================================
// 2. ROUTE DONASI
// ==========================================================

Route::post('/donasi/manual', [DonasiController::class, 'storeManual'])->name('donasi.manual.store');

// A. DONASI MANUAL
Route::get('/donasi-manual/{id?}', function ($id = null) {
    $campaign = $id ? \App\Models\Campaign::find($id) : null;
    return view('landing.donasi_manual', compact('campaign'));
})->name('donasi.manual');

// B. DONASI PAKET
Route::get('/donasi-paket/{id?}', function (Request $request, $id = null) {
    $campaign = $id ? \App\Models\Campaign::find($id) : null;
    $paket = [
        'nama_paket' => $request->query('nama', 'Paket Donasi'),
        'harga'      => $request->query('harga', 0),
        'kategori'   => $request->query('kategori', 'umum'),
    ];
    return view('landing.donasi_paket', compact('campaign', 'paket'));
})->name('donasi.paket');

// C. PROSES DONASI
Route::post('/kirim-donasi', [DonasiController::class, 'store'])->name('donasi.store');


// ==========================================================
// 3. ROUTE ADMIN PANEL
// ==========================================================
// PENTING: Tambahkan name('admin.') agar semua route di dalam sini otomatis punya awalan 'admin.'
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Route Login & Logout
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login'); // Jadi: admin.login
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Middleware Auth (Hanya Admin yang Login)
    Route::middleware('auth')->group(function () {
        
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // Jadi: admin.dashboard
        
        // Route Dashboard Alternative
        Route::get('/dashboard-alt', [AdminController::class, 'index'])->name('dashboard.alt');

        Route::get('/donasi-masuk', [RiwayatDonasiController::class, 'index'])->name('donasi.index');
        Route::get('/data-donatur', [RiwayatDonasiController::class, 'donatur'])->name('donatur.index');

        // Manajemen Donasi
        Route::patch('/donasi/{id}/approve', [AdminController::class, 'approveDonation'])->name('donasi.approve');
        Route::patch('/donasi/{id}/reject', [DashboardController::class, 'rejectDonation'])->name('donasi.reject');
        Route::delete('/donasi/{id}/delete', [DashboardController::class, 'deleteDonation'])->name('donasi.delete');

        // Manajemen Campaign
        Route::resource('campaign', CampaignController::class);
        //Route::get('campaign/{id}/edit', [CampaignController::class, 'edit'])->name('admin.campaign.edit');
        //Route::put('campaign/{id}', [CampaignController::class, 'update'])->name('admin.campaign.update');
        // Manajemen Kabar Lapangan (Post)
        Route::resource('posts', PostController::class);
        //Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
        //Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
        
    });
   
});