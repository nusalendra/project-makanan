<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orderan;

class PelayanController extends Controller
{
    public function indexpelayan(request $request){
        $orderan = orderan::all();
        return view('pelayan.onlinepage',compact('orderan'));
    }

    public function indexpelayanoffline(request $request){
        return view('pelayan.offlinepage');
    }
}
