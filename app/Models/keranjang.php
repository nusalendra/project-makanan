<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $primarykey = 'id';
    protected $fillable = ['user_id','user_nama','tambahmakanan_id','menu','qty','harga'];

}
