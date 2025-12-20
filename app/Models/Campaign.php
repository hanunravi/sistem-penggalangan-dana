<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    // Sesuaikan dengan nama tabel di database Anda
    // Jika nama tabelnya 'campaigns', baris ini opsional.
    // protected $table = 'campaigns'; 

    protected $fillable = [
        'title', 
        'image', 
        'target_dana', 
        'nominal_terkumpul', // Kolom ini bisa kita update manual atau biarkan sistem menghitung
        'description', 
        'status'
    ];

    // =========================================================
    // 1. RELASI KE TABEL DONASI
    // =========================================================
    public function donasis()
    {
        // Pastikan Anda sudah punya Model Donasi
        return $this->hasMany(Donasi::class, 'campaign_id');
    }

    // =========================================================
    // 2. HITUNG TOTAL UANG TERKUMPUL (OTOMATIS)
    // =========================================================
    // Fitur ini disebut "Accessor". 
    // Cara panggil di Blade nanti: $campaign->total_donasi_fix
    public function getTotalDonasiFixAttribute()
    {
        // Logika: Ambil semua donasi untuk campaign ini, filter yang APPROVED, lalu jumlahkan amount-nya
        return $this->donasis()->where('status', 'approved')->sum('amount');
    }

    // =========================================================
    // 3. HITUNG PERSEN (%) UNTUK PROGRESS BAR
    // =========================================================
    // Cara panggil di Blade nanti: $campaign->persentase
    public function getPersentaseAttribute()
    {
        // Ambil total uang dari fungsi di atas
        $terkumpul = $this->total_donasi_fix; 
        $target = $this->target_dana;

        // Cegah error jika targetnya 0 atau belum diisi
        if ($target <= 0) {
            return 0;
        }

        // Hitung persen
        $persen = ($terkumpul / $target) * 100;

        // Kita kunci maksimal 100% (supaya bar tidak keluar layar jika donasi berlebih)
        return min($persen, 100);
    }
}