<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use Illuminate\Support\Facades\Auth; // Tambahkan ini jika pakai Auth::id()

class DonasiController extends Controller
{
    public function store(Request $request)
    {
        // ==========================================================
        // 1. LOGIKA VALIDASI
        // ==========================================================
        $request->validate([
            // PENTING: Ubah 'required|exists' jadi 'nullable'. 
            // Kita akan cek manual nanti apakah ID-nya 0 atau bukan.
            'campaign_id'     => 'nullable', 
            
            'donatur_name'    => 'required|string|max:255',
            'amount'          => 'required|numeric|min:10000',
            'kategori_donasi' => 'nullable|string',
            'message'         => 'nullable|string',
            'payment_proof'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // ==========================================================
        // 2. LOGIKA PENANGANAN CAMPAIGN ID (0 -> NULL)
        // ==========================================================
        // Kita tangkap dulu inputnya
        $id_campaign_fix = $request->campaign_id;

        // Jika inputnya "0" (String) atau 0 (Integer), ubah jadi NULL
        // Agar database tidak error mencari ID 0
        if ($id_campaign_fix == '0' || $id_campaign_fix == 0) {
            $id_campaign_fix = null;
        }

        // ==========================================================
        // 3. UPLOAD GAMBAR
        // ==========================================================
        $nama_file = null;
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('payment_proof', $nama_file, 'public');
        }

        // ==========================================================
        // 4. SIMPAN KE DATABASE
        // ==========================================================
        Donasi::create([
            // Gunakan variabel yang sudah kita perbaiki di atas (bisa angka ID, bisa NULL)
            'campaign_id'     => $id_campaign_fix, 
            
            // Cek apakah user sedang login? Jika ya ambil ID-nya, jika tidak NULL
            'user_id'         => Auth::id() ?? null, 

            'donatur_name'    => $request->donatur_name,
            'email'           => $request->email,
            'is_anonymous'    => $request->has('is_anonymous') ? 1 : 0, 
            'amount'          => $request->amount,
            'message'         => $request->message,
            'payment_proof'   => $nama_file,
            'status'          => 'pending',

            // Logika Jenis Donasi & Paket
            'jenis_donasi'    => $request->jenis_donasi ?? 'manual', 
            'nama_paket'      => $request->nama_paket ?? null, 
            'kategori_donasi' => $request->kategori_donasi,
        ]);

        return redirect()->back()->with('success', 'Alhamdulillah! Donasi berhasil dikirim dan menunggu verifikasi.');
    }
    
}