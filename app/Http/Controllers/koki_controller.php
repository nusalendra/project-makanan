<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use App\Models\orderan;
use App\Models\Orderoffline;
use App\Models\tambahmakanan;

class koki_controller extends Controller
{
    public function koki(request $request){
        $pemesanan = pemesanan::paginate(100);
        $tambahmakanan = tambahmakanan::all();
        return view('koki.homekoki',compact('pemesanan','tambahmakanan'));
    }

    public function kokioffline(request $request){
        $Orderoffline = Orderoffline::all();
        return view('koki.kokioffline',compact('Orderoffline'));
    }

    public function loginkoki(request $request){
        return view('koki.loginkoki');
    }

    public function orderselesaikoki(request $request){
        return view('koki.orderselesaikoki');
    }
}
