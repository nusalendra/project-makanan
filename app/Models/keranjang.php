<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $primarykey = 'id';
    protected $fillable = ['user_id','tambahmakanan_id','menu','qty','harga','status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tambahmakanan() {
        return $this->belongsToMany(tambahmakanan::class);
    }

    public function pembayaran() {
        return $this->belongsToMany(Pembayaran::class);
    }

    public function keranjangPembayaran() {
        return $this->belongsToMany(KeranjangPembayaran::class, 'keranjang_pembayaran', 'keranjang_id', 'pembayaran_id');
    }
}
