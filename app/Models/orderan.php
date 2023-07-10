<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderan extends Model
{
    use HasFactory;
    protected $table = 'orderan';
    protected $primarykey = 'id';
    protected $fillable = ['pesanan','qty','harga'];
}
