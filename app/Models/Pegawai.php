<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primarykey = 'id';
    protected $fillable = ['nip','nama_pegawai','username','password','lokasi_penempatan'];
}
