<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahmakanan extends Model
{
    use HasFactory;
    protected $table = 'tambahmakanan';
    protected $primarykey = 'id';
    protected $fillable = ['kategori','no_produk','nama_prdk','komposisi', 'kuota' ,'harga','images']; 

    public function keranjang() {
        return $this->belongsToMany(keranjang::class);
    }

    public function pesananOffline() {
        return $this->hasMany(PesananOffline::class);
    }
    
}