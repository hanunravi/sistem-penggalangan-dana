<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public function store(Request $request)
    {
        // 1. VALIDASI INPUT
        $request->validate([
            'donatur_name'    => 'required|string|max:255',
            // amount wajib numeric & min 10000. 
            // Jika paket tidak ada harganya, ini akan error & ditangkap frontend
            'amount'          => 'required|numeric|min:10000', 
            'email'           => 'nullable|email',
            'kategori_donasi' => 'nullable|string',
            'nama_paket'      => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            // 2. Setting Midtrans (Ambil dari .env)
            $serverKey = env('MIDTRANS_SERVER_KEY');
            if (empty($serverKey)) {
                throw new \Exception('Server Key Midtrans belum disetting!');
            }

            // 3. Simpan ke Database
            $donasi = Donasi::create([
                'campaign_id'     => $request->campaign_id != 0 ? $request->campaign_id : null,
                'user_id'         => Auth::id() ?? null,
                'donatur_name'    => $request->donatur_name,
                'email'           => $request->email,
                'is_anonymous'    => $request->has('is_anonymous') ? 1 : 0,
                'amount'          => $request->amount,
                'message'         => $request->message,
                'payment_proof'   => 'midtrans_auto', // Penanda otomatis
                'status'          => 'pending',
                'jenis_donasi'    => $request->jenis_donasi ?? 'manual',
                'nama_paket'      => $request->nama_paket ?? null,
                'kategori_donasi' => $request->kategori_donasi,
            ]);

            // 4. Request Token ke Midtrans
            \Midtrans\Config::$serverKey = $serverKey;
            // Gunakan filter_var agar string "false" terbaca sebagai boolean false
            \Midtrans\Config::$isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN);
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $orderId = 'DONASI-' . $donasi->id . '-' . time();
            
            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $donasi->amount,
                ],
                'customer_details' => [
                    'first_name' => $request->donatur_name,
                    'email' => $request->email,
                ],
                'item_details' => [
                    [
                        'id' => 'DONASI',
                        'price' => (int) $request->amount,
                        'quantity' => 1,
                        // Nama paket dipotong max 50 char biar gak error midtrans
                        'name' => 'Donasi: ' . substr(($request->nama_paket ?? 'Sukarela'), 0, 40)
                    ]
                ]
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'snap_token' => $snapToken,
                'donasi_id' => $donasi->id
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error Donasi: ' . $e->getMessage());
            // Return JSON error agar ditangkap 'catch' di JS
            return response()->json(['message' => 'Gagal: ' . $e->getMessage()], 500);
        }
    }
}