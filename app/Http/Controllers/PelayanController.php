<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orderan;
use App\Models\Orderoffline;
use App\Models\tambahmakanan;
use PDF;

class PelayanController extends Controller
{
    public function indexpelayan(request $request){
        $orderan = orderan::all();
        return view('pelayan.onlinepage',compact('orderan'));
    }

    public function indexkasir(request $request){
        $tambahmakanan = tambahmakanan::all();
        $total_orderan = tambahmakanan::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('kasir.homekasir',compact('tambahmakanan','total_orderan'));
    }

    public function download_invoice(){
        $tambahmakanan = tambahmakanan::all();
        $total_orderan = tambahmakanan::selectraw("sum(harga*qty) as totalorderan")->first();
        $pdf = PDF::loadView('download.cetakinvoice',compact('tambahmakanan','total_orderan'));
        return $pdf->download('Invoice.pdf');
    }

    public function indexpelayanoffline(request $request){
        $tambahmakanan = tambahmakanan::all();
        return view('pelayan.offlinepage',compact('tambahmakanan'));
    }

    public function keranjangoffline(request $request){
        $orderoffline = Orderoffline::all();
        return view('pelayan.keranjangoffline',compact('orderoffline'));
    }

    public function addorderoffline(request $request){
        Orderoffline::create($request->all());
        return redirect('orderoffline')->with('sukses','Data Telah Di Tambah!');  
    }

    public function editorderoffline(request $request, $id){
        $orderoffline = Orderoffline::find($id);
        $orderoffline->qty = $request->input('qty'); 
        $orderoffline->save();
        return redirect('keranjangoffline');
    }

    public function hapusorderoffline($id){
        Orderoffline::where('id',$id)->delete();
        return redirect()->back();
    }

    public function findidorderoffline($id){
        $orderoffline = Orderoffline::where('id',$id)->first();
        $data = [
            'title' => 'orderoffline',
            'orderoffline' => $orderoffline
        ];
        return view('pelayan.editorderanoffline',$data);
    }

    public function loginpelayan(request $request){
        return view('pelayan.loginpelayan');
    }

    public function selesaiorderall(request $request){
        return view('pelayan.selesaiorderall');
    }
    
}

