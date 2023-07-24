<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderan;
use App\Models\tambahmakanan;
use App\Models\Pembayaran;


class user_controller extends Controller
{
    public function indexuser(){
        $tambahmakanan = tambahmakanan::all();
        return view('user.homepage',compact('tambahmakanan'));
    }

    public function indexminum(){
        $orderan = orderan::all();
        return view('user.minumanpage', compact('orderan'));
    }

    public function indexalacarte(){
        $orderan = orderan::all();
        return view('user.alacartepage', compact('orderan'));
    }

    public function profil(request $request){
        return view('user.profil');
    }

    public function menu(request $request){
        $tambahmakanan = tambahmakanan::all();
        return view('user.homepage', compact('tambahmakanan'));
    }

    public function keranjang(request $request){
        $orderan = orderan::all();
        $tambahmakanan = tambahmakanan::all();
        $total_orderan = tambahmakanan::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('user.simpanmenu',compact('orderan','total_orderan','tambahmakanan'));
    }

    public function editkeranjang(request $request, $id){
        $tambahmakanan = tambahmakanan::find($id);
        $tambahmakanan->qty = $request->input('qty');
        $tambahmakanan->save();
        return redirect('/keranjang');
    }

    public function findidkeranjang($id){
        $tambahmakanan = tambahmakanan::where('id',$id)->first();
        $data = [
            'title' => 'tambahmakanan',
            'tambahmakanan' => $tambahmakanan
        ];
        return view('user.editqty',$data);
    }

    public function hapusmakanan($id){
        tambahmakanan::where('id',$id)->delete();
        return redirect()->back();
    }


    public function invoice(request $request){
        $tambahmakanan = tambahmakanan::all();
        $pembayaran = Pembayaran::all();
        $total_orderan = tambahmakanan::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('user.invoice',compact('tambahmakanan','total_orderan','pembayaran'));
    }

    public function selesai(){
        return view('user.selesai');
    }

    public function loginuser(request $request){
        return view('user.loginuser');
    }

    public function addpembayaran(request $request){
        Pembayaran::create($request->all());
        return redirect('invoice')->with('sukses','penambahan telah berhasil!');
    }

}

