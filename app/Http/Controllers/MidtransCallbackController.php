<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Campaign; // Import Model Campaign
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION'), FILTER_VALIDATE_BOOLEAN);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        try {
            $notif = new Notification();

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $order_id = $notif->order_id;
            $fraud = $notif->fraud_status;

            // Ambil ID Donasi dari Order ID (Format: DONASI-123-TIMESTAMP)
            $orderParts = explode('-', $order_id);
            $donasiId = $orderParts[1] ?? null;

            $donasi = Donasi::findOrFail($donasiId);

            // Simpan status lama untuk pengecekan
            $oldStatus = $donasi->status;

            // 2. Tentukan Status Baru
            $newStatus = $oldStatus;

            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $newStatus = 'pending';
                    } else {
                        $newStatus = 'approved';
                    }
                }
            } else if ($transaction == 'settlement') {
                // Settlement = Sukses
                $newStatus = 'approved'; 
            } else if ($transaction == 'pending') {
                $newStatus = 'pending';
            } else if ($transaction == 'deny') {
                $newStatus = 'rejected';
            } else if ($transaction == 'expire') {
                $newStatus = 'expired';
            } else if ($transaction == 'cancel') {
                $newStatus = 'canceled';
            }

            // 3. Update Status di Database
            $donasi->status = $newStatus;
            $donasi->save();

            // 4. LOGIKA PENTING: Update Saldo Campaign Otomatis
            // Jika status berubah jadi 'approved' DAN sebelumnya belum approved
            if ($newStatus == 'approved' && $oldStatus != 'approved') {
                
                // Cek apakah donasi ini untuk campaign tertentu
                if ($donasi->campaign_id) {
                    $campaign = Campaign::find($donasi->campaign_id);
                    if ($campaign) {
                        // Tambahkan nominal donasi ke total terkumpul
                        $campaign->nominal_terkumpul = $campaign->nominal_terkumpul + $donasi->amount;
                        $campaign->save();
                        
                        Log::info("Saldo Campaign ID {$campaign->id} bertambah sebesar Rp {$donasi->amount}");
                    }
                }
            }

            return response()->json(['message' => 'Callback processed', 'status' => $newStatus]);

        } catch (\Exception $e) {
            Log::error("Midtrans Callback Error: " . $e->getMessage());
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}