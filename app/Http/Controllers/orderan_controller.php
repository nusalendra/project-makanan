<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderan;

class orderan_controller extends Controller
{
    public function findiddatamakanan($id){
        $orderan = orderan::find($id);
        $data = [
            'title' => 'data',
            'orderan' => $orderan
        ];
        return view('karyawan.makanan', $data);
    }

    public function findiddataminuman($id){
        $orderan = orderan::find($id);
        $data = [
            'title' => 'data',
            'orderan' => $orderan
        ];
        return view('karyawan.minuman', $data);
    }

    public function addorderan(Request $request){
        orderan::create($request->all());
        return redirect('homepage')->with('sukses','Data Telah Di Tambah!');  
    }

    public function hapusorderan($id){
        orderan::where('id',$id)->delete();
        return redirect()->back();
    }

    public function editorderan(request $request, $id){
        $orderan = orderan::find($id);
        $orderan->pesanan = $request->input('pesanan');
        $orderan->qty = $request->input('qty');
        $orderan->harga = $request->input('harga'); 
        $orderan->save();
        return redirect('/keranjang');
    }

    public function findidorderan($id){
        $orderan = orderan::where('id',$id)->first();
        $data = [
            'title' => 'orderan',
            'orderan' => $orderan
        ];
        return view('user.editorderan',$data);
    }

    
}
