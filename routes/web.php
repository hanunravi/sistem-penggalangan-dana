<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// --- CONTROLLER ---
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DonasiController;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\PostController; 
use App\Http\Controllers\Admin\RiwayatDonasiController;
use App\Http\Controllers\Admin\SearchController;

/*
|--------------------------------------------------------------------------
| 1. ROUTE PUBLIC (LANDING PAGE)
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/cara-kerja', [LandingController::class, 'caraKerja'])->name('landing.cara-kerja');
Route::get('/kontak', [LandingController::class, 'kontak'])->name('landing.kontak');
Route::get('/campaign', [LandingController::class, 'campaign'])->name('landing.campaign');
Route::get('/campaign/{id}', [LandingController::class, 'show'])->name('campaign.show');

Route::get('/kabar-lapangan', function() {
    $posts = \App\Models\Post::latest()->paginate(9);
    return view('landing.news', compact('posts')); 
})->name('kabar.index');

Route::get('/kabar-lapangan/{slug}', function($slug) {
    $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
    return view('landing.detail_post', compact('post')); 
})->name('kabar.show');

/*
|--------------------------------------------------------------------------
| 2. ROUTE DONASI (TRANSAKSI)
|--------------------------------------------------------------------------
*/

// A. Donasi Manual
Route::get('/donasi-manual/{id?}', function ($id = null) {
    $campaign = $id ? \App\Models\Campaign::find($id) : null;
    // Sesuaikan folder view dengan struktur Anda (landing/front)
    return view('landing.donasi_manual', compact('campaign')); 
})->name('donasi.manual');

// B. Donasi Paket (PERBAIKAN DI SINI)
Route::get('/donasi-paket', function (Request $request) {
    // Cek apakah ada ID campaign yang dikirim lewat URL (?id=1)
    $campaign = null;
    if ($request->has('id')) {
        $campaign = \App\Models\Campaign::find($request->id);
    }
    
    // Sesuaikan folder view (landing/front)
    return view('landing.donasi_paket', compact('campaign')); 
})->name('donasi.paket');

// C. Proses Kirim
Route::post('/kirim-donasi', [DonasiController::class, 'store'])->name('donasi.store');

/*
|--------------------------------------------------------------------------
| 3. ROUTE ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.submit');
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::patch('/donasi/{id}/approve', [DashboardController::class, 'approveDonation'])->name('donasi.approve');
        Route::patch('/donasi/{id}/reject', [DashboardController::class, 'rejectDonation'])->name('donasi.reject');
        Route::delete('/donasi/{id}/delete', [DashboardController::class, 'deleteDonation'])->name('donasi.delete');

        Route::get('/donasi-masuk', [RiwayatDonasiController::class, 'index'])->name('donasi.index');
        Route::get('/data-donatur', [RiwayatDonasiController::class, 'donatur'])->name('donatur.index');

        Route::resource('campaign', CampaignController::class);
        Route::resource('posts', PostController::class);
        Route::get('/search', [SearchController::class, 'index'])->name('search');
    });
});