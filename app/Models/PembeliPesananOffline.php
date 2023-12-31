<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembeliPesananOffline extends Model
{
    use HasFactory;
    protected $table = 'pembeli_pesanan_offline';
    protected $primarykey = 'id';
    protected $fillable = ['pembeli_id', 'pesanan_offline_id'];

    public function pesananOffline()
    {
        return $this->belongsTo(PesananOffline::class, 'pesanan_offline_id');
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_id');
    }
}
