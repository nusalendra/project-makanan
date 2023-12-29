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
        // $pemesanan = pemesanan::paginate(100);
        $keranjang = keranjang::all();
        return view('koki.homekoki',compact('keranjang'));
    }

    public function kokioffline(request $request){
        $pemesananoffline = pemesananoffline::all();
        return view('koki.kokioffline',compact('pemesananoffline'));
    }

    public function loginkoki(request $request){
        return view('koki.loginkoki');
    }

    public function orderselesaikoki(request $request){
        $keranjang = keranjang::where('status','selesai')->get();
        $pemesananoffline = pemesananoffline::where('status_offline','selesai')->get();
        return view('koki.orderselesaikoki',compact('keranjang','pemesananoffline'));
    }
    
    public function editstatus(request $request, $id){
        $tambahmakanan = keranjang::find($id);
        $tambahmakanan->status = $request->input('status');
        $tambahmakanan->save();
        return redirect('/koki');
    }

    public function editstatusoffline(request $request, $id){
        $pemesananoffline = pemesananoffline::find($id);
        $pemesananoffline->status_offline = $request->input('status_offline');
        $pemesananoffline->save();
        return redirect('/kokioffline');
    }
}
