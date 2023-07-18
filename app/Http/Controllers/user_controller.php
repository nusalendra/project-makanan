<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderan;
use App\Models\tambahmakanan;


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
        $total_orderan = orderan::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('user.simpanmenu',compact('orderan','total_orderan','tambahmakanan'));
    }

    public function editkeranjang(request $request, $id){
        $tambahmakanan = tambahmakanan::find($id);
        $tambahmakanan->qty= $request->input('qty');
        $tambahmakanan->save();
        return redirect('/keranjang');
    }

    public function findidmakanan($id){
        $tambahmakanan = tambahmakanan::where('id',$id)->first();
        $data = [
            'title' => 'tambahmakanan',
            'tambahmakanan' => $tambahmakanan
        ];
        return view('user.simpanmenu',$data);
    }

    public function invoice(request $request){
        $orderan = orderan::all();
        $total_orderan = orderan::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('user.invoice',compact('orderan','total_orderan'));
    }

    public function selesai(){
        return view('user.selesai');
    }

    public function loginuser(request $request){
        return view('user.loginuser');
    }

}

