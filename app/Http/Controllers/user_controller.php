<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderan;

class user_controller extends Controller
{
    public function indexuser(){
        $orderan = orderan::all();
        return view('user.homepage',compact('orderan'));
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
        $orderan = orderan::all();
        return view('user.homepage', compact('orderan'));
    }

    public function keranjang(request $request){
        $orderan = orderan::all();
        $total_orderan = orderan::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('user.simpanmenu',compact('orderan','total_orderan'));
    }
}

