<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesananoffline;
use App\Models\keranjang;
use App\Models\Pembayaran;
use App\Models\KeranjangPembayaran;
use App\Models\Pembeli;
use App\Models\PembeliPesananOffline;
use App\Models\PesananOffline;
use Illuminate\Support\Facades\Crypt;

class koki_controller extends Controller
{
    public function koki(request $request)
    {
        $data = Pembayaran::with('keranjang')
            ->where('status', 'Diterima')
            ->whereHas('keranjang', function ($query) {
                $query->whereNotIn('status', ['Pesanan Sudah Siap', 'Pesanan Diambil']);
            })
            ->get();

        return view('koki.homekoki', compact('data'));
    }

    public function pesananSiapOffline(Request $request)
    {
        $pesananOfflineIds = $request->input('pesananOfflineId');

        foreach ($pesananOfflineIds as $index => $pesananOfflineId) {
            $data = PesananOffline::find($pesananOfflineId);

            if ($data) {
                $data->status_pesanan = 'Pesanan Sudah Siap';

                $data->save();
            }
        }

        return redirect('/kokioffline');
    }

    public function detailPesananOnline($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();
        // dd($data);
        return view('koki.detail-pesanan-online', compact('data'));
    }

    public function pesananSiapOnline(Request $request)
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
        $data = Pembeli::with('pesananOffline')
            ->whereHas('pesananOffline', function ($query) {
                $query->where('status_pesanan', 'Proses');
            })
            ->get();

        return view('koki.kokioffline', compact('data'));
    }

    public function detailPesananOffline($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = PembeliPesananOffline::with('pesananOffline', 'pembeli')
            ->where('pembeli_id', $idDecrypt)->get();
        // dd($data);
        return view('koki.detail-pesanan-offline', compact('data'));
    }

    public function detailPesananOfflineSelesai($id)
    {

        $idDecrypt = Crypt::decrypt($id);
        $data = PembeliPesananOffline::with('pesananOffline', 'pembeli')
            ->where('pembeli_id', $idDecrypt)->get();

        return view('koki.detail-pesanan-offline-selesai', compact('data'));
    }

    public function loginkoki(request $request)
    {
        return view('koki.loginkoki');
    }

    public function orderselesaikoki(request $request)
    {
        $orderSelesaiOnline = Pembayaran::with('keranjang')
            ->where('status', 'Diterima')
            ->whereHas('keranjang', function ($query) {
                $query->whereNotIn('status', ['Pesanan Diambil']);
            })
            ->get();

        $orderSelesaiOffline = Pembeli::with('pesananOffline')
            ->whereHas('pesananOffline', function ($query) {
                $query->where('status_pesanan', '=', 'Pesanan Sudah Siap')->orWhere('status_pesanan', '=', 'Pesanan Diambil');
            })->get();

        return view('koki.orderselesaikoki', compact('orderSelesaiOnline', 'orderSelesaiOffline'));
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
