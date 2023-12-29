<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primarykey = 'id';
    protected $fillable = ['keranjang_id', 'metode', 'id_pembayaran', 'status'];

    public function keranjang() {
        return $this->belongsToMany(keranjang::class);
    }
}

