<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $primarykey = 'id';
    protected $fillable = ['nama_pmsn','no_hp','makanan','harga','ket'];
}
