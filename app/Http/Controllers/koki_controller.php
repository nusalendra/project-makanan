<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use App\Models\orderan;
use App\Models\pemesananoffline;
use App\Models\keranjang;
use App\Models\tambahmakanan;

class koki_controller extends Controller
{
    public function koki(request $request){
        $pemesanan = pemesanan::paginate(100);
        $keranjang = keranjang::all();
        return view('koki.homekoki',compact('pemesanan','keranjang'));
    }

    public function kokioffline(request $request){
        $pemesananoffline = pemesananoffline::all();
        return view('koki.kokioffline',compact('pemesananoffline'));
    }

    public function loginkoki(request $request){
        return view('koki.loginkoki');
    }

    public function orderselesaikoki(request $request){
        return view('koki.orderselesaikoki');
    }
}
