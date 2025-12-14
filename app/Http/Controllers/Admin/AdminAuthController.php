<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // 1. Tampilkan Form Login
    public function showLoginForm()
    {
        // Debugging: Jika halaman tetap putih, uncomment baris di bawah ini untuk tes
        // dd('Halaman Login Berhasil Dipanggil'); 

        // Jika sudah login, lempar langsung ke dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        
        // Memanggil file di resources/views/admin/auth/login.blade.php
        return view('admin.auth.login');
    }

    // 2. Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // 3. Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}