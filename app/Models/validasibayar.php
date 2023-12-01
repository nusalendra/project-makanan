<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validasibayar extends Model
{
    use HasFactory;
    protected $table = 'validasibayar';
    protected $primarykey = 'id';
    protected $fillable = ['id_pembayaran'];
}
