<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesananoffline;
use App\Models\keranjang;
use App\Models\Pembayaran;
use App\Models\KeranjangPembayaran;
use Illuminate\Support\Facades\Crypt;

class koki_controller extends Controller
{
    public function koki(request $request)
    {
        $data = Pembayaran::with('keranjang')->where('status', 'Diterima')->get();
        return view('koki.homekoki', compact('data'));
    }

    public function detailPesananOnline($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();
        // dd($data);
        return view('koki.detail-pesanan', compact('data'));
    }

    public function pesananSiap(Request $request)
    {
        $keranjangIds = $request->input('keranjangId');

        foreach ($keranjangIds as $index => $keranjangId) {
            $data = keranjang::find($keranjangId);

            if ($data) {
                $data->status = 'Pesanan Sudah Siap';

                $data->save();
            }
        }

        return redirect('/koki');
    }

    public function detailPesananOnlineSelesai($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();
        // dd($data);
        return view('koki.detail-pesanan-online-selesai', compact('data'));
    }

    public function kokioffline(request $request)
    {
        $pemesananoffline = pemesananoffline::all();
        return view('koki.kokioffline', compact('pemesananoffline'));
    }

    public function loginkoki(request $request)
    {
        return view('koki.loginkoki');
    }

    public function orderselesaikoki(request $request)
    {
        $data = Pembayaran::with('keranjang')
            ->whereHas('keranjang', function ($query) {
                $query->where('keranjang.status', '=', 'Pesanan Sudah Siap')->orWhere('keranjang.status', '=', 'Pesanan Diambil');
            })
            ->get();
        $pemesananoffline = pemesananoffline::where('status_offline', 'selesai')->get();
        return view('koki.orderselesaikoki', compact('data', 'pemesananoffline'));
    }

    public function editstatus(request $request, $id)
    {
        $tambahmakanan = keranjang::find($id);
        $tambahmakanan->status = $request->input('status');
        $tambahmakanan->save();
        return redirect('/koki');
    }

    public function editstatusoffline(request $request, $id)
    {
        $pemesananoffline = pemesananoffline::find($id);
        $pemesananoffline->status_offline = $request->input('status_offline');
        $pemesananoffline->save();
        return redirect('/kokioffline');
    }
}
