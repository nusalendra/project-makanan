<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $table = 'pembeli';
    protected $primarykey = 'id';
    protected $fillable = ['nomor_order','nama','status_pembayaran'];

    public function pesananOffline() {
        return $this->belongsToMany(PesananOffline::class);
    }

    public function pembeliPesananOffline() {
        return $this->belongsToMany(PembeliPesananOffline::class, 'pembeli_pesanan_offlines', 'pembeli_id', 'pesanan_offline_id');
    }
}
