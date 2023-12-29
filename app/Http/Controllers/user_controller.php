<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderan;
use App\Models\tambahmakanan;
use App\Models\Pembayaran;
use App\Models\Pemesananoffline;
use App\Models\keranjang;
use App\Models\validasibayar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class user_controller extends Controller
{
    public function indexuser()
    {
        $user = auth()->user();
        $tambahmakanan = tambahmakanan::all();
        
        $tambahmakananId = $tambahmakanan->first()->id;
        
        $keranjang = keranjang::where('user_id', $user->id)
            ->where('tambahmakanan_id', $tambahmakananId)
            ->value('status');

        return view('user.homepage', compact('tambahmakanan', 'keranjang', 'user'));
    }

    public function indexhalamanutama()
    {
        $tambahmakanan = tambahmakanan::all();
        return view('user.halamanutama', compact('tambahmakanan'));
    }

    public function addtoCart(Request $request)
    {
        $data = [
            'tambahmakanan_id' => $request->idmakanan,
            'user_id' => auth()->user()->id,
            'user_nama' => auth()->user()->name,
            'menu' => $request->menu,
            'qty' => 1,
            'harga' => $request->harga,
            'status' => 'Dalam Keranjang'
        ];
        keranjang::create($data);
        return redirect()->back();
    }

    public function indexminum()
    {
        $orderan = orderan::all();
        return view('user.minumanpage', compact('orderan'));
    }

    public function indexalacarte()
    {
        $orderan = orderan::all();
        return view('user.alacartepage', compact('orderan'));
    }

    public function profil(request $request)
    {
        return view('user.profil');
    }

    public function keranjang(request $request)
    {
        $keranjang = keranjang::all();
        // dd($keranjang);
        $total_orderan = keranjang::selectraw("sum(harga*qty) as totalorderan")->first();
        $keranjang = keranjang::where('user_id', auth()->user()->id)->get();
        return view('user.simpanmenu', compact('keranjang', 'total_orderan', 'keranjang'));
    }

    public function keranjangoffline(request $request)
    {
        // $orderan = orderan::all();
        // $tambahmakanan = tambahmakanan::all();
        $pemesananoffline = pemesananoffline::all();
        $total_orderan = pemesananoffline::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
        //$keranjang=keranjang::where('user_id', auth()->user()->id)->get();
        return view('user.simpanoffline', compact('pemesananoffline', 'total_orderan'));
    }

    public function editkeranjang(request $request, $id)
    {
        $tambahmakanan = keranjang::find($id);
        $tambahmakanan->qty = $request->input('qty');
        $tambahmakanan->save();
        return redirect('/keranjang');
    }

    public function editkeranjangoffline(request $request, $id)
    {
        $pemesananoffline = pemesananoffline::find($id);
        $pemesananoffline->qty_offline = $request->input('qty_offline');
        $pemesananoffline->save();
        return redirect('/simpanoffline');
    }

    public function findidkeranjang($id)
    {
        $tambahmakanan = tambahmakanan::where('id', $id)->first();
        $data = [
            'title' => 'tambahmakanan',
            'tambahmakanan' => $tambahmakanan
        ];
        return view('user.editqty', $data);
    }

    public function hapusmakanan($id)
    {
        tambahmakanan::where('id', $id)->delete();
        return redirect()->back();
    }


    public function invoice(request $request)
    {
        $keranjang = keranjang::all();
        $pembayaran = Pembayaran::all();
        $total_orderan = keranjang::selectraw("sum(harga*qty) as totalorderan")->first();
        return view('user.invoice', compact('keranjang', 'total_orderan', 'pembayaran'));
    }

    public function selesai(request $request)
    {
        $pemesananoffline = pemesananoffline::all();
        $data = validasibayar::where('status', 'selesai')->get();
        $data = DB::table('keranjang')
            ->join('pembayaran', 'pembayaran.id', '=', 'keranjang.id')
            ->join('validasibayar', 'validasibayar.id', '=', 'pembayaran.id')
            ->get();
        return view('user.selesai', compact('pemesananoffline'))->with('data', $data);
    }

    public function loginuser(request $request)
    {
        return view('user.loginuser');
    }

    public function addpembayaran(request $request)
    {
        $user = Auth::user();
        // dd($user);
        $pembayaran = new Pembayaran();

        $pembayaran->user_id = $user->id;
        $pembayaran->metode = $request->metode;

        $pembayaran->save();

        return redirect('keranjang')->with('sukses', 'penambahan telah berhasil!');
    }

    public function addvalidasibayar(request $request)
    {
        validasibayar::create($request->all());
        return redirect('keranjang')->with('sukses', 'penambahan telah berhasil!');
    }

    public function addpembeli(request $request)
    {
        Pemesananoffline::create($request->all());
        return redirect('simpanoffline')->with('sukses', 'penambahan telah berhasil!');
    }
}
