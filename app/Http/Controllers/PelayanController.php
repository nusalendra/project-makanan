<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pemesananoffline;
use App\Models\Orderoffline;
use App\Models\tambahmakanan;
use App\Models\keranjang;
use App\Models\Pembayaran;
use App\Models\KeranjangPembayaran;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\Crypt;
use Termwind\Components\Raw;

class PelayanController extends Controller
{
    public function indexpelayan(request $request)
    {
        $keranjang = keranjang::all();
        return view('pelayan.onlinepage', compact('keranjang'));
    }

    public function indexkasir(request $request)
    {
        $orderoffline = Orderoffline::all();
        $pemesananoffline = pemesananoffline::all();
        $keranjang = keranjang::all();
        $total_orderan = pemesananoffline::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
        return view('kasir.homekasir', compact('keranjang', 'total_orderan', 'orderoffline', 'pemesananoffline'));
    }

    public function invoice(request $request)
    {
        $keranjang = keranjang::all();
        $pemesananoffline = pemesananoffline::all();
        $total_orderan = pemesananoffline::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
        return view('kasir.invoicekasir', compact('keranjang', 'total_orderan', 'pemesananoffline'));
    }

    public function indexkasironline(request $request)
    {
        $data = Pembayaran::with('keranjang')->get();
        return view('kasir.kasironline')->with('data', $data);
    }

    public function detailPesanan($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();
        // dd($data);
        return view('kasir.detail-pesanan', compact('data'));
    }

    public function validasiPesanan(Request $request) {
        $pembayaranIds = $request->input('pembayaranId');

        $data = Pembayaran::find($pembayaranIds);

        if($data) {
            $data->status = 'Diterima';

            $data->save();
        }
        
        // foreach($keranjangIds as $index => $keranjangId) {
        //     $data = keranjang::find($keranjangId);

        //     if($data) {
        //         $data->status = 'Diterima';

        //         $data->save();
        //     }
        // }

        return redirect ('/kasir-online');
    }

    public function indexdetailpesanan(request $request)
    {
        $tambahmakanan = tambahmakanan::all();
        $orderoffline = Orderoffline::all();
        $pemesananoffline = pemesananoffline::all();
        $total_orderan = tambahmakanan::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
        return view('kasir.detailpesanan', compact('pemesananoffline', 'total_orderan', 'orderoffline'));
    }

    public function hitungkembalian(request $request)
    {
        $operasi = $request->input('operasi');
        $bil_pertama = $request->input('bil_1');
        $bil_kedua = $request->input('bil_2');
        $result = $bil_pertama - $bil_kedua;

        // if($operasi == "kurang"){
        //     $result = $bil_pertama - $bil_kedua;
        // }

        return redirect('kasir')->with('info', 'kembaliannya : ' . $result);
    }

    public function download_invoice()
    {
        $tambahmakanan = tambahmakanan::all();
        $total_orderan = keranjang::selectraw("sum(harga*qty) as totalorderan")->first();
        $pdf = PDF::loadView('download.cetakinvoice', compact('tambahmakanan', 'total_orderan'));
        return $pdf->download('Invoice.pdf');
    }

    public function download_kasir()
    {
        $pemesananoffline = pemesananoffline::all();
        $total_orderan = pemesananoffline::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
        $pdf = PDF::loadView('download.cetakkasir', compact('pemesananoffline', 'total_orderan'));
        return $pdf->download('Invoice.pdf');
    }

    public function indexpelayanoffline(request $request)
    {
        $keranjang = keranjang::all();
        $pemesananoffline = pemesananoffline::all();
        return view('pelayan.offlinepage', compact('keranjang', 'pemesananoffline'));
    }

    public function keranjangoffline(request $request)
    {
        $orderoffline = Orderoffline::all();
        $pemesananoffline = pemesananoffline::where('user_id', auth()->user()->id)
            ->where('status_pesanan', 0)->get();
        return view('pelayan.keranjangoffline', compact('orderoffline', 'pemesananoffline'));
    }

    public function addorderoffline(request $request)
    {
        // pemesananoffline::create([
        //     'menu_offline'=>$request->namaproduk,
        //     'qty_offline' => $request->qty_offline,
        //     'harga_offline' => $request->hargaproduk
        // ]);
        $namapembeli = $request->nama_pembeli;
        $orderOffline = pemesananoffline::where('status_offline', null)
            ->pluck('id')->toArray();
        foreach ($orderOffline as $id) {
            pemesananoffline::where('id', $id)
                ->update([
                    'nama_pembeli' => $namapembeli,
                    'status_offline' => 'bayar'
                ]);
        }
        return redirect()->to('/kasir');
    }

    public function addpesananoffline(request $request)
    {
        pemesananoffline::create([
            'menu_offline' => $request->namaproduk,
            'qty_offline' => $request->qty_offline,
            'harga_offline' => $request->hargaproduk
        ]);
        return redirect()->to('/simpanoffline');
    }


    public function editorderoffline(request $request, $id)
    {
        $orderoffline = Orderoffline::find($id);
        $orderoffline->qty_offline = $request->input('qty_offline');
        $orderoffline->save();
        return redirect('keranjangoffline');
    }

    public function hapusorderoffline($id)
    {
        Orderoffline::where('id', $id)->delete();
        return redirect()->back();
    }

    public function findidorderoffline($id)
    {
        $orderoffline = Orderoffline::where('id', $id)->first();
        $data = [
            'title' => 'orderoffline',
            'orderoffline' => $orderoffline
        ];
        return view('pelayan.editorderanoffline', $data);
    }

    public function loginpelayan(request $request)
    {
        return view('pelayan.loginpelayan');
    }

    public function selesaiorderall(request $request)
    {
        return view('pelayan.selesaiorderall');
    }

    public function getHarga($id)
    {
        $makanan = tambahmakanan::where('id', $id)->first();
        return response()->json([
            'makanan' => $makanan
        ]);
    }
}
