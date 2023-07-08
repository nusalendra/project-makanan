<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelayanController extends Controller
{
    public function indexpelayan(request $request){
        return view('pelayan.onlinepage');
    }

    public function indexpelayanoffline(request $request){
        return view('pelayan.offlinepage');
    }
}
