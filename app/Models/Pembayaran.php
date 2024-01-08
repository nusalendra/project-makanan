<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primarykey = 'id';
    protected $fillable = ['nomor_order', 'opsi_pengiriman', 'alamat' ,'metode', 'id_pembayaran', 'total_harga_semua_pesanan', 'status', 'alasan_pembatalan_pesanan'];

    public function keranjang() {
        return $this->belongsToMany(keranjang::class);
    }

    public function keranjangPembayaran() {
        return $this->belongsToMany(KeranjangPembayaran::class, 'keranjang_pembayaran', 'pembayaran_id', 'keranjang_id');
    }
}

