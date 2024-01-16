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
use App\Models\Pembeli;
use App\Models\PembeliPesananOffline;
use App\Models\PesananOffline;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;

class PelayanController extends Controller
{
    public function indexpelayan(request $request)
    {
        $keranjang = keranjang::all();
        return view('pelayan.onlinepage', compact('keranjang'));
    }

    public function indexkasiroffline(request $request)
    {
        $user = Auth::user();
        $data = Pembeli::with('pesananOffline')->get();
        // $total_orderan = pemesananoffline::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
        return view('kasir.kasir-offline', compact('data', 'user'));
    }

    public function detailPesananKasirOffline($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = PembeliPesananOffline::with('pesananOffline', 'pembeli')
            ->where('pembeli_id', $idDecrypt)
            ->get();
        
        return view('kasir.detail-pesanan-offline', compact('data', 'user'));
    }

    public function pembayaran($id, Request $request)
    {
        $pembeli = Pembeli::find($id);

        $pembeli->uang_dibayarkan = $request->uang_dibayarkan;
        $pembeli->status_pembayaran = 'Sudah Bayar';

        $pembeli->save();

        return redirect('/order-offline');
    }

    public function indexkasironline(request $request)
    {
        $user = Auth::user();
        $data = Pembayaran::with('keranjang')
            ->where(function ($query) {
                $query->where('status', '!=', 'Pesanan Dibatalkan');
            })
            ->whereHas('keranjang', function ($query) {
                $query->where('status', '!=', 'Pesanan Dibatalkan');
            })
            ->get();

        return view('kasir.kasironline', compact('data', 'user'));
    }

    public function detailPesananKasirOnline($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();
        
        return view('kasir.detail-pesanan-online', compact('data', 'user'));
    }

    public function validasiPesanan(Request $request)
    {
        $pembayaranIds = $request->input('pembayaranId');

        $data = Pembayaran::find($pembayaranIds);

        if ($data) {
            $data->status = 'Diterima';

            $data->save();
        }

        return redirect('/kasir-online');
    }

    public function pesananOnlineDibatalkan()
    {
        $user = Auth::user();
        $data = Pembayaran::with('keranjang')
            ->where(function ($query) {
                $query->where('status', 'Pesanan Dibatalkan');
            })
            ->whereHas('keranjang', function ($query) {
                $query->where('status', '=', 'Pesanan Dibatalkan');
            })
            ->get();

        return view('kasir.pesanan-online-dibatalkan', compact('data', 'user'));
    }

    public function detailPesananOnlineDibatalkan($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();

        return view('kasir.detail-pesanan-online-dibatalkan', compact('data', 'user'));
    }

    public function menuPelanggan(request $request)
    {
        $user = Auth::user();
        $tambahmakanan = tambahmakanan::all();

        $keranjang = keranjang::where('user_id', $user->id)
            ->where('status', 'Dalam Keranjang')
            ->pluck('tambahmakanan_id');

        return view('pelayan.menu-pelanggan', compact('tambahmakanan', 'keranjang', 'user'));
    }

    public function tambahKeranjang(Request $request)
    {
        $data = [
            'tambahmakanan_id' => $request->tambahMakananId,
            'menu' => $request->menu,
            'harga' => $request->harga,
            'qty' => 0,
            'status_pesanan' => 'Dalam Keranjang'
        ];
        PesananOffline::create($data);
        return redirect()->back();
    }

    public function keranjangOffline()
    {
        $user = Auth::user();
        $pesananOffline = PesananOffline::with('tambahMakanan')->where('status_pesanan', '=', 'Dalam Keranjang')->get();
        
        return view('pelayan.keranjang-offline', compact('pesananOffline', 'user'));
    }

    public function keranjangDelete($id)
    {
        $pesananOffline = PesananOffline::find($id);
        $pesananOffline->delete();

        return redirect('/keranjang-offline');
    }

    public function checkoutPembeli(Request $request)
    {
        $pesananOfflineIds = $request->input('pesananOfflineId');

        $qtys = $request->input('qty');

        $pesananOfflineIdsToSave = [];
        $totalSemuaPesanan = 0;
        foreach ($pesananOfflineIds as $index => $pesananOfflineId) {
            $data = PesananOffline::find($pesananOfflineId);

            if ($data) {
                $qty = $qtys[$index];

                $data->qty = $qty;
                $data->status_pesanan = 'Proses';

                $data->save();

                // Tambahkan ID keranjang ke array untuk disimpan di pivot table antara Keranjang dan Pembayaran
                $pesananOfflineIdsToSave[] = $data->id;
            }
            $totalSemuaPesanan += $data->qty * $data->harga;
        }

        // Simpan array ID keranjang ke dalam relasi many-to-many
        $pembeli = new Pembeli();
        $pembeli->nomor_order = 'ORD_' . rand(100000000, 999999999);
        $pembeli->nama = $request->nama;
        $pembeli->total_harga_semua_pesanan = $totalSemuaPesanan;
        $pembeli->status_pembayaran = 'Belum Bayar';

        $pembeli->save();

        $pembeli->pesananOffline()->attach($pesananOfflineIdsToSave);

        return redirect('keranjang-offline');
    }

    public function orderOffline()
    {
        $user = Auth::user();
        $data = Pembeli::where('status_pembayaran', 'Belum Bayar')
            ->orWhere('status_pembayaran', 'Sudah Bayar')
            ->whereHas('pesananOffline', function ($query) {
                $query->where('status_pesanan', '!=', 'Pesanan Diambil');
            })->get();

        return view('pelayan.order-offline', compact('data', 'user'));
    }

    public function detailPesananOffline($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = PembeliPesananOffline::with('pesananOffline', 'pembeli')
            ->where('pembeli_id', $idDecrypt)->get();

        return view('pelayan.detail-pesanan-offline', compact('data', 'user'));
    }

    public function pesananDiambilOffline(Request $request)
    {
        $pesananOfflineIds = $request->input('pesananOfflineId');

        foreach ($pesananOfflineIds as $index => $pesananOfflineId) {
            $data = PesananOffline::find($pesananOfflineId);

            if ($data) {
                $data->status_pesanan = 'Pesanan Diambil';

                $data->save();
            }
        }

        return redirect('/order-offline');
    }

    public function indexpelayanonline(request $request)
    {
        $user = Auth::user();
        $data = Pembayaran::with('keranjang')
            ->where('status', 'Diterima')
            ->whereHas('keranjang', function ($query) {
                $query->whereNotIn('status', ['Pesanan Diambil']);
            })
            ->get();

        return view('pelayan.order-online', compact('data', 'user'));
    }

    public function detailPesananOnline($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();
        // dd($data);
        return view('pelayan.detail-pesanan-online', compact('data', 'user'));
    }

    public function pesananDiambilOnline(Request $request)
    {
        $keranjangIds = $request->input('keranjangId');

        foreach ($keranjangIds as $index => $keranjangId) {
            $data = keranjang::find($keranjangId);

            if ($data) {
                $data->status = 'Pesanan Diambil';

                $data->save();
            }
        }

        return redirect('/order-online');
    }

    public function orderSelesai()
    {
        $user = Auth::user();
        $orderSelesaiOffline = Pembeli::with('pesananOffline')
            ->whereHas('pesananOffline', function ($query) {
                $query->where(function ($subquery) {
                    $subquery->Where('status_pesanan', '=', 'Pesanan Diambil');
                });
            })
            ->where('status_pembayaran', '=', 'Sudah Bayar')
            ->get();

        $orderSelesaiOnline = Pembayaran::with('keranjang')
            ->whereHas('keranjang', function ($query) {
                $query->where('status', '=', 'Pesanan Diambil');
            })
            ->where('status', 'Diterima')
            ->get();

        return view('pelayan.order-selesai', compact('orderSelesaiOffline', 'orderSelesaiOnline', 'user'));
    }

    public function detailPesananOrderanSelesaiOnline($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();

        return view('pelayan.detail-pesanan-online-order-selesai', compact('data', 'user'));
    }

    public function detailPesananOrderanSelesaiOffline($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = PembeliPesananOffline::with('pesananOffline', 'pembeli')
            ->where('pembeli_id', $idDecrypt)->get();

        return view('pelayan.detail-pesanan-offline-order-selesai', compact('data', 'user'));
    }
}
