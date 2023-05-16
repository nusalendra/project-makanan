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

    
}
