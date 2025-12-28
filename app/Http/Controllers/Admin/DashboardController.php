<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Donasi; 
use App\Models\Campaign;
use Carbon\Carbon; 

class DashboardController extends Controller
{
    public function index()
    {
        // 1. STATISTIK UTAMA
        $totalDonasi = Donasi::where('status', 'approved')->sum('amount');
        $jumlahDonatur = Donasi::where('status', 'approved')->count();
        $donasiPending = Donasi::where('status', 'pending')->count();
        $campaignCount = Campaign::count(); 

        // 2. DATA TABEL TERBARU
        $recentDonations = Donasi::orderBy('created_at', 'desc')->take(10)->get();

        // 3. GRAFIK BULANAN
        $donasiTahunIni = Donasi::where('status', 'approved')
            ->whereYear('created_at', date('Y'))
            ->get();

        $grafikGrouped = $donasiTahunIni->groupBy(function($item) {
            return $item->created_at->format('n'); 
        });

        $labelBulan = [];
        $dataBulanan = [];

        for ($i = 1; $i <= 12; $i++) {
            $labelBulan[] = Carbon::create()->month($i)->translatedFormat('F');
            $dataBulanan[] = isset($grafikGrouped[$i]) ? $grafikGrouped[$i]->sum('amount') : 0;
        }

        return view('admin.dashboard', compact(
            'totalDonasi', 'jumlahDonatur', 'donasiPending', 'campaignCount',   
            'recentDonations', 'labelBulan', 'dataBulanan'      
        ));
    }

    // --- FUNGSI APPROVE MANUAL (YANG DIPERBAIKI) ---
    public function approveDonation($id)
    {
        $donasi = Donasi::findOrFail($id);
        
        // PENTING: Cek status dulu. Jangan approve kalau sudah approved (biar saldo gak dobel)
        if ($donasi->status !== 'approved') {
            
            // 1. Ubah Status Jadi Approved
            $donasi->status = 'approved';
            $donasi->save();

            // 2. Tambahkan Saldo ke Campaign (PENTING!)
            if($donasi->campaign_id) {
                $campaign = Campaign::find($donasi->campaign_id);
                
                if ($campaign) {
                    // Gunakan increment() agar lebih aman dan otomatis nambah
                    // Pastikan nama kolom di database adalah 'current_amount'
                    $campaign->increment('current_amount', $donasi->amount);
                }
            }
        }

        return redirect()->back()->with('success', 'Donasi berhasil diterima! Saldo campaign telah diperbarui.');
    }

    // --- FUNGSI REJECT ---
    public function rejectDonation($id)
    {
        $donasi = Donasi::findOrFail($id);
        
        // Jika sebelumnya sudah approved, kita harus kurangi saldo campaign dulu sebelum reject
        if ($donasi->status === 'approved' && $donasi->campaign_id) {
            $campaign = Campaign::find($donasi->campaign_id);
            if ($campaign) {
                $campaign->decrement('current_amount', $donasi->amount);
            }
        }

        $donasi->status = 'rejected';
        $donasi->save();

        return redirect()->back()->with('warning', 'Status donasi diubah menjadi Ditolak.');
    }

    // --- FUNGSI DELETE ---
    public function deleteDonation($id)
    {
        $donasi = Donasi::findOrFail($id);

        // Hapus file bukti jika ada (dan bukan midtrans)
        if ($donasi->payment_proof && $donasi->payment_proof !== 'midtrans_auto') {
            $path = public_path('storage/payment_proof/' . $donasi->payment_proof);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        // Jika menghapus data yang statusnya 'approved', saldo campaign harus dikurangi juga
        if ($donasi->status === 'approved' && $donasi->campaign_id) {
            $campaign = Campaign::find($donasi->campaign_id);
            if ($campaign) {
                $campaign->decrement('current_amount', $donasi->amount);
            }
        }

        $donasi->delete();

        return redirect()->back()->with('error', 'Data donasi telah dihapus permanen.');
    }
}