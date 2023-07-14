<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orderan;
use App\Models\Orderoffline;

class PelayanController extends Controller
{
    public function indexpelayan(request $request){
        $orderan = orderan::all();
        return view('pelayan.onlinepage',compact('orderan'));
    }

    public function indexpelayanoffline(request $request){
        $orderoffline = Orderoffline::all();
        return view('pelayan.offlinepage',compact('orderoffline'));
    }

    public function addorderoffline(request $request){
        Orderoffline::create($request->all());
        return redirect('orderoffline')->with('sukses','Data Telah Di Tambah!');  
    }

    public function editorderoffline(request $request, $id){
        $orderoffline = Orderoffline::find($id);
        $orderoffline->nama_pelanggan = $request->input('nama_pelanggan');
        $orderoffline->no_meja = $request->input('no_meja');
        $orderoffline->pesanan = $request->input('pesanan'); 
        $orderoffline->qty = $request->input('qty'); 
        $orderoffline->harga = $request->input('harga'); 
        $orderoffline->save();
        return redirect('orderoffline');
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
        return view('pelayan.offlinepage',$data);
    }
}
