<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;

//route utama
Route::get('/', [LandingController::class, 'index'])->name('home');

//landing page routes(user)
Route::get('/donasi-manual', function () {return view('landing.donasi_manual');});
Route::post('/donasi-manual', function () {// Handle donation submission
});
Route::get('/donasi-paket', function () {return view('landing.donasi_paket');});
Route::post('/donasi-paket', function () {// Handle donation submission
});

// --- ROUTE ADMIN PANEL ---
Route::prefix('admin')->group(function () {
    
    // 1. Route untuk Login & Logout (Bisa diakses siapa saja)
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // 2. Route Dashboard (HANYA BISA DIAKSES JIKA SUDAH LOGIN)
    // Kita bungkus dengan middleware 'auth'
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        // Tambahkan route admin lain di sini nanti
    });
    
});

