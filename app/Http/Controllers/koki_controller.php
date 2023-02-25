<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;

class koki_controller extends Controller
{
    public function koki(request $request){
        $pemesanan = pemesanan::paginate(100);
        return view('koki.homekoki',compact('pemesanan'));
    }
}
