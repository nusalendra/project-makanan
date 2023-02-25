<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderan;

class orderan_controller extends Controller
{
    public function findiddatamakanan($id){
        $orderan = orderan::find($id);
        $data = [
            'title' => 'data',
            'orderan' => $orderan
        ];
        return view('karyawan.makanan', $data);
    }
}
