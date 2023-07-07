<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Pegawai;
use App\Models\Lokasi;

class AdminController extends Controller
{
    public function indexadmin(){
        return view('admin.homeadmin');
    }

    public function loginadmin(request $request){
        return view('admin.loginadmin');
    }

    public function tambahmakanan(request $request){
        return view('admin.tambahmakanan');
    }

    public function tambahlokasi(request $request){
        $data_lokasi = lokasi::all();
        return view('admin.tambahlokasi',compact('data_lokasi'));
    }

    
    public function tambahpegawai(request $request){
        $data_pegawai = pegawai::all();
        return view('admin.tambahpegawai',compact('data_pegawai'));
    }

    public function addpegawai(request $request){
        pegawai::create($request->all());
        return redirect('tambahpegawai')->with('sukses','penambahan telah berhasil!');
    }

    public function editpegawai(request $request, $id){
        $data_pegawai = pegawai::find($id);
        $data_pegawai->nip = $request->input('nip');
        $data_pegawai->nama_pegawai = $request->input('nama_pegawai');
        $data_pegawai->username = $request->input('username');
        $data_pegawai->password = $request->input('password');
        $data_pegawai->lokasi_penempatan = $request->input('lokasi_penempatan');
        $data_pegawai->save();
        return redirect('tambahpegawai');
    }

    public function findidpegawai($id){
        $data_pegawai = pegawai::where('id',$id)->first();
        $data = [
            'title' => 'pegawai',
            'data_pegawai' => $data_pegawai
        ];
        return view('admin.editpegawai',$data);
    }

    public function hapuspegawai($id){
        pegawai::where('id',$id)->delete();
        return redirect()->back();
    }

    public function addlokasi(request $request){
        lokasi::create($request->all());
        return redirect('tambahlokasi')->with('sukses','penambahan telah berhasil!');
    }

    public function editlokasi(request $request, $id){
        $data_lokasi = lokasi::find($id);
        $data_lokasi->kode = $request->input('kode');
        $data_lokasi->nama_lokasi = $request->input('nama_lokasi');
        $data_lokasi->jalan = $request->input('jalan');
        $data_lokasi->save();
        return redirect('tambahlokasi');
    }

    public function findidlokasi($id){
        $data_lokasi = lokasi::where('id',$id)->first();
        $data = [
            'title' => 'lokasi',
            'data_lokasi' => $data_lokasi
        ];
        return view('admin.editlokasi',$data);
    }

    public function hapuslokasi($id){
        lokasi::where('id',$id)->delete();
        return redirect()->back();
    }


}
