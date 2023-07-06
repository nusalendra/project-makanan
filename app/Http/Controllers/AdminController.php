<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function indexadmin(){
        return view('admin.homeadmin');
    }

    public function loginadmin(request $request){
        return view('admin.loginadmin');
    }

    public function tambahmakanan(){
        return view('admin.tambahmakanan');
    }

    public function tambahlokasi(){
        return view('admin.tambahlokasi');
    }

    
    public function tambahpegawai(){
        return view('admin.tambahpegawai');
    }

}
