<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingpage_Controller extends Controller
{
    public function landingpage(request $request){
        return view('user.landingpage');
    }
}
