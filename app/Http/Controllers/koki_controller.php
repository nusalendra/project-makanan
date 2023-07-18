<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use App\Models\orderan;
use App\Models\Orderoffline;

class koki_controller extends Controller
{
    public function koki(request $request){
        $pemesanan = pemesanan::paginate(100);
        $orderan = orderan::all();
        return view('koki.homekoki',compact('pemesanan','orderan'));
    }

    public function kokioffline(request $request){
        $Orderoffline = Orderoffline::all();
        return view('koki.kokioffline',compact('Orderoffline'));
    }

    public function loginkoki(request $request){
        return view('koki.loginkoki');
    }
}
