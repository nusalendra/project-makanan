<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderoffline extends Model
{
    use HasFactory;
    protected $table = 'orderoffline';
    protected $primarykey = 'id';
    protected $fillable = ['nama_pelanggan','no_meja','pesanan','qty','harga'];
}
