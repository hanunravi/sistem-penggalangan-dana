<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Campaign;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donations';

    // SESUAIKAN DENGAN SCREENSHOT DATABASE KAMU
    protected $fillable = [
        'campaign_id',
        'donatur_name',     // Sebelumnya 'nama'
        'email',            // (Opsional)
        'is_anonymous',     // Untuk fitur Hamba Allah
        'jenis_donasi',     // manual/otomatis
        'kategori_donasi',  // bencana/pendidikan/dll
        'nama_paket',       // (Opsional)
        'amount',           // Sebelumnya 'nominal'
        'message',          // Sebelumnya 'pesan'
        'payment_proof',    // Sebelumnya 'bukti_transfer'
        'status',
    ];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }
}
