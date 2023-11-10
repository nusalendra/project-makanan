<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orderan;
use App\Models\Orderoffline;
use App\Models\tambahmakanan;
use App\Models\keranjang;
use App\Models\Pembayaran;
use PDF;

class PelayanController extends Controller
{
    public function indexpelayan(request $request){
        $tambahmakanan = tambahmakanan::all();
        return view('pelayan.onlinepage',compact('tambahmakanan'));
    }

    public function indexkasir(request $request){
        $orderoffline = Orderoffline::all();
        $keranjang = keranjang::all();
        $total_orderan = keranjang::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('kasir.homekasir',compact('keranjang','total_orderan','orderoffline'));
    }

    public function indexkasironline(request $request){
        $keranjang = keranjang::all();
        $pembayaran = Pembayaran::all();
        $total_orderan = keranjang::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('kasir.kasironline',compact('keranjang','total_orderan','pembayaran'));
    }

    public function indexdetailpesanan(request $request){
        $tambahmakanan = tambahmakanan::all();
        $orderoffline = Orderoffline::all();
        $total_orderan = tambahmakanan::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('kasir.detailpesanan',compact('tambahmakanan','total_orderan','orderoffline'));
    }

    public function hitungkembalian(request $request){
        $operasi = $request->input('operasi');
        $bil_pertama = $request->input('bil_1');
        $bil_kedua = $request->input('bil_2');
        $result = 0;

        if($operasi == "kurang"){
            $result = $bil_pertama - $bil_kedua;
        }

        return redirect('detailpesanan')->with('info','kembaliannya : '.$result);
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

