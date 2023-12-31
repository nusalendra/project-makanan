<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananOffline extends Model
{
    use HasFactory;
    protected $table = 'pesanan_offline';
    protected $primarykey = 'id';
    protected $fillable = ['tambahmakanan_id', 'qty', 'menu', 'harga' ,'status_pesanan'];

    public function pembeli()
    {
        return $this->belongsToMany(Pembeli::class);
    }

    public function pembeliPesananOffline()
    {
        return $this->belongsToMany(PembeliPesananOffline::class, 'pembeli_pesanan_offline', 'pesanan_offline_id', 'pembeli_id');
    }

    public function tambahMakanan()
    {
        return $this->belongsTo(tambahmakanan::class);
    }
}
