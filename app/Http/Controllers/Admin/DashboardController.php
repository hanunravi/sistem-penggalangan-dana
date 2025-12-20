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
        // --- 1. DATA STATISTIK (KARTU ATAS) ---
        $totalDonasi = Donasi::where('status', 'approved')->sum('amount');
        $jumlahDonatur = Donasi::count();
        $donasiPending = Donasi::where('status', 'pending')->count();
        
        // Opsional: Hitung jumlah campaign aktif untuk kartu ke-4
        $campaignCount = Campaign::where('status', 'aktif')->count(); 

        // --- 2. DATA TABEL (Donasi Terbaru) ---
       $recentDonations = Donasi::orderBy('created_at', 'desc')
                            ->get();

        // --- 3. LOGIKA GRAFIK (BARU DITAMBAHKAN) ---
        // Ambil data donasi 'approved' tahun ini, kelompokkan per bulan
        $grafik = Donasi::select(
                DB::raw('SUM(amount) as total'), 
                DB::raw('MONTH(created_at) as month')
            )
            ->whereYear('created_at', date('Y'))   
            ->where('status', 'approved')          
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Siapkan array kosong
        $labelBulan = [];
        $dataBulanan = [];

        // Loop bulan 1 sampai 12 agar grafik tidak bolong
        for ($i = 1; $i <= 12; $i++) {
            // Nama bulan (January, February, dst)
            $labelBulan[] = Carbon::create()->month($i)->format('F');

            // Cek apakah ada data di bulan ini
            $cekData = $grafik->firstWhere('month', $i);

            // Jika ada ambil totalnya, jika tidak ada isi 0
            $dataBulanan[] = $cekData ? $cekData->total : 0;
        }

        // --- 4. KIRIM SEMUA KE VIEW ---
        return view('admin.dashboard', compact(
            'totalDonasi', 
            'jumlahDonatur', 
            'donasiPending', 
            'campaignCount',   // Tambahan
            'recentDonations',
            'labelBulan',      // Data Grafik (Label)
            'dataBulanan'      // Data Grafik (Angka)
        ));
    }

    // --- FUNGSI 1: TERIMA DONASI (APPROVE) ---
    public function approveDonation($id)
    {
        $donasi = Donasi::findOrFail($id);
        
        // Cek status agar saldo tidak bertambah ganda
        if ($donasi->status !== 'approved') {
            
            $donasi->status = 'approved';
            $donasi->save();

            // Tambahkan saldo ke campaign terkait
            $campaign = Campaign::find($donasi->campaign_id);
            
            if ($campaign) {
                $campaign->nominal_terkumpul = $campaign->nominal_terkumpul + $donasi->amount;
                $campaign->save();
            }
        }

        return redirect()->back()->with('success', 'Alhamdulillah, donasi berhasil diverifikasi.');
    }

    // --- FUNGSI 2: TOLAK DONASI (REJECT) ---
    public function rejectDonation($id)
    {
        $donasi = Donasi::findOrFail($id);
        $donasi->status = 'rejected';
        $donasi->save();

        return redirect()->back()->with('error', 'Status donasi telah diubah menjadi Ditolak.');
    }

    // --- FUNGSI 3: HAPUS DONASI ---
    public function deleteDonation($id)
    {
        $donasi = Donasi::findOrFail($id);

        // Hapus file bukti transfer jika ada
        if ($donasi->payment_proof && file_exists(public_path('storage/payment_proof/' . $donasi->payment_proof))) {
            unlink(public_path('storage/payment_proof/' . $donasi->payment_proof));
        }

        $donasi->delete();

        return redirect()->back()->with('error', 'Data donasi telah dihapus permanen.');
    }
}