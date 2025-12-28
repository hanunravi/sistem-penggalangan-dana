<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Campaign;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donations';

    
    protected $fillable = [
        'campaign_id',
        'donatur_name',     
        'email',           
        'is_anonymous',    
        'jenis_donasi',     
        'kategori_donasi',  
        'nama_paket',       
        'amount',           
        'message',          
        'status',
    ];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }
}
