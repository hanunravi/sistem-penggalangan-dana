<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    // Pastikan fillable sesuai dengan kolom di Database Migration
    protected $fillable = [
        'title', 
        'slug',             // WAJIB ADA
        'image', 
        'target_amount',    // Sesuai DB
        'current_amount',   // Sesuai DB
        'description', 
        'status'
    ];

    // =========================================================
    // 1. RELASI KE TABEL DONASI
    // =========================================================
    public function donasis()
    {
        return $this->hasMany(Donasi::class, 'campaign_id');
    }

    // =========================================================
    // 2. HITUNG TOTAL UANG TERKUMPUL (OTOMATIS)
    // =========================================================
    // Kita gunakan kolom 'current_amount' di database sebagai cache/utama.
    // Tapi jika ingin hitung ulang dari tabel donasi, bisa pakai logika ini.
    public function getTotalDonasiFixAttribute()
    {
        // Opsi 1: Ambil langsung dari kolom database (Lebih Cepat)
        return $this->current_amount;

        // Opsi 2: Hitung manual dari relasi (Lebih Akurat tapi query nambah)
        // return $this->donasis()->where('status', 'approved')->sum('amount');
    }

    // =========================================================
    // 3. HITUNG PERSEN (%) UNTUK PROGRESS BAR
    // =========================================================
    public function getPersentaseAttribute()
    {
        $terkumpul = $this->total_donasi_fix; // Menggunakan accessor di atas
        $target = $this->target_amount;       // Sesuai nama kolom DB

        if ($target <= 0) {
            return 0;
        }

        $persen = ($terkumpul / $target) * 100;

        return min($persen, 100);
    }
}