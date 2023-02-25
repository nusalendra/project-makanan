<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user_controller extends Controller
{
    public function indexuser(){
        return view('user.homepage');
    }

    public function indexminum(){
        return view('user.minumanpage');
    }

    public function indexalacarte(){
        return view('user.alacartepage');
    }
}
