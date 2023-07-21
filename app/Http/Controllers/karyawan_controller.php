<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class karyawan_controller extends Controller
{
  

    public function makanan(request $request){
        return view('karyawan.makanan');
    }

    public function loginkaryawan(request $request){
        return view('loginkaryawan.login');
    }

    public function addpemesanan(Request $request){ 
        pemesanan::create($request->all());
        return redirect('pemesanan')->with('sukses','Data Telah Di Tambah!');  
        //return view('karyawan.pemesanan');
    }

    public function deletepemesanan($id){
        pemesanan::where('id',$id)->delete();
        return redirect()->back();
    }

    public function findiddata($id){
        $pemesanan = pemesanan::find($id);
        $data = [
            'title' => 'data',
            'pemesanan' => $pemesanan
        ];
        return view('karyawan.home', $data);
    }

    public function formminuman(){
        return view('karyawan.minuman');
    }

    public function datasnack(){
        return view('karyawan.snack');
    }

    public function simpan(){
        return view('karyawan.simpan');
    }

    public function homekaryawan(){
        return view('karyawan.homekaryawan');
    }

    public function pesananmasuk(){
        return view('karyawan.pesananmasuk');
    }

}
