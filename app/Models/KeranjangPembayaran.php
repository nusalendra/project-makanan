<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangPembayaran extends Model
{
    use HasFactory;
    protected $table = 'keranjang_pembayaran';
    protected $primarykey = 'id';
    protected $fillable = ['keranjang_id','pembayaran_id'];

    public function keranjang() {
        return $this->belongsTo(keranjang::class, 'keranjang_id');
    }

    public function pembayaran() {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id');
    }
}
