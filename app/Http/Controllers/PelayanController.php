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
        $data = Pembeli::with('pesananOffline')->get();
        // $total_orderan = pemesananoffline::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
        return view('kasir.kasir-offline', compact('data'));
    }

    public function detailPesananKasirOffline($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = PembeliPesananOffline::with('pesananOffline', 'pembeli')
            ->where('pembeli_id', $idDecrypt)
            ->get();
        // dd($data);
        return view('kasir.detail-pesanan-offline', compact('data'));
    }

    public function pembayaran($id, Request $request)
    {
        $pembeli = Pembeli::find($id);

        $pembeli->uang_dibayarkan = $request->uang_dibayarkan;
        $pembeli->status_pembayaran = 'Sudah Bayar';

        $pembeli->save();

        return redirect('/order-offline');
    }
    // public function invoice(request $request)
    // {
    //     $keranjang = keranjang::all();
    //     $pemesananoffline = pemesananoffline::all();
    //     $total_orderan = pemesananoffline::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
    //     return view('kasir.invoicekasir', compact('keranjang', 'total_orderan', 'pemesananoffline'));
    // }

    public function indexkasironline(request $request)
    {
        $data = Pembayaran::with('keranjang')
            ->where(function ($query) {
                $query->where('status', '!=', 'Pesanan Dibatalkan');
            })
            ->whereHas('keranjang', function ($query) {
                $query->where('status', '!=', 'Pesanan Dibatalkan');
            })
            ->get();

        return view('kasir.kasironline')->with('data', $data);
    }

    public function detailPesananKasirOnline($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();
        // dd($data);
        return view('kasir.detail-pesanan-online', compact('data'));
    }

    public function validasiPesanan(Request $request)
    {
        $pembayaranIds = $request->input('pembayaranId');

        $data = Pembayaran::find($pembayaranIds);

        if ($data) {
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

        return redirect('/kasir-online');
    }

    public function tambahOngkir(Request $request)
    {
        $pembayaranIds = $request->input('pembayaranId');

        $data = Pembayaran::find($pembayaranIds);

        if ($data) {
            $data->status = 'Diterima';
            $data->ongkos_kirim = $request->ongkos_kirim;

            $data->save();
        }

        return redirect('/kasir-online');
    }

    public function pesananOnlineDibatalkan()
    {
        $data = Pembayaran::with('keranjang')
            ->where(function ($query) {
                $query->where('status', 'Pesanan Dibatalkan');
            })
            ->whereHas('keranjang', function ($query) {
                $query->where('status', '=', 'Pesanan Dibatalkan');
            })
            ->get();

        return view('kasir.pesanan-online-dibatalkan', compact('data'));
    }

    public function detailPesananOnlineDibatalkan($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();
        
        return view('kasir.detail-pesanan-online-dibatalkan', compact('data'));
    }

    // public function indexdetailpesanan(request $request)
    // {
    //     $tambahmakanan = tambahmakanan::all();
    //     $orderoffline = Orderoffline::all();
    //     $pemesananoffline = pemesananoffline::all();
    //     $total_orderan = tambahmakanan::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
    //     return view('kasir.detailpesanan', compact('pemesananoffline', 'total_orderan', 'orderoffline'));
    // }

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

    // public function download_invoice()
    // {
    //     $tambahmakanan = tambahmakanan::all();
    //     $total_orderan = keranjang::selectraw("sum(harga*qty) as totalorderan")->first();
    //     $pdf = PDF::loadView('download.cetakinvoice', compact('tambahmakanan', 'total_orderan'));
    //     return $pdf->download('Invoice.pdf');
    // }

    // public function download_kasir()
    // {
    //     $pemesananoffline = pemesananoffline::all();
    //     $total_orderan = pemesananoffline::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
    //     $pdf = PDF::loadView('download.cetakkasir', compact('pemesananoffline', 'total_orderan'));
    //     return $pdf->download('Invoice.pdf');
    // }

    public function menuPelanggan(request $request)
    {
        $user = auth()->user();
        $tambahmakanan = tambahmakanan::all();

        $keranjang = keranjang::where('user_id', $user->id)
            ->where('status', 'Dalam Keranjang')
            ->pluck('tambahmakanan_id');

        return view('pelayan.menu-pelanggan', compact('tambahmakanan', 'keranjang'));
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
        $pesananOffline = PesananOffline::with('tambahMakanan')->where('status_pesanan', '=', 'Dalam Keranjang')->get();
        // dd($pesananOffline);
        return view('pelayan.keranjang-offline', compact('pesananOffline'));
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
        $data = Pembeli::where('status_pembayaran', 'Sudah Bayar')
            ->whereHas('pesananOffline', function ($query) {
                $query->where('status_pesanan', '!=', 'Pesanan Diambil');
            })->get();

        return view('pelayan.order-offline', compact('data'));
    }

    public function detailPesananOffline($id)
    {

        $idDecrypt = Crypt::decrypt($id);
        $data = PembeliPesananOffline::with('pesananOffline', 'pembeli')
            ->where('pembeli_id', $idDecrypt)->get();
        // $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
        //     ->where('pembayaran_id', $idDecrypt)
        //     ->get();

        return view('pelayan.detail-pesanan-offline', compact('data'));
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
        $data = Pembayaran::with('keranjang')
            ->where('status', 'Diterima')
            ->whereHas('keranjang', function ($query) {
                $query->whereNotIn('status', ['Pesanan Diambil']);
            })
            ->get();

        return view('pelayan.order-online', compact('data'));
    }

    public function detailPesananonline($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();
        // dd($data);
        return view('pelayan.detail-pesanan-online', compact('data'));
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

        return view('pelayan.order-selesai', compact('orderSelesaiOffline', 'orderSelesaiOnline'));
    }

    public function detailPesananOrderanSelesaiOnline($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();

        return view('pelayan.detail-pesanan-online-order-selesai', compact('data'));
    }

    public function detailPesananOrderanSelesaiOffline($id)
    {
        $idDecrypt = Crypt::decrypt($id);
        $data = PembeliPesananOffline::with('pesananOffline', 'pembeli')
            ->where('pembeli_id', $idDecrypt)->get();

        return view('pelayan.detail-pesanan-offline-order-selesai', compact('data'));
    }

    // public function addorderoffline(request $request)
    // {
    //     // pemesananoffline::create([
    //     //     'menu_offline'=>$request->namaproduk,
    //     //     'qty_offline' => $request->qty_offline,
    //     //     'harga_offline' => $request->hargaproduk
    //     // ]);
    //     $namapembeli = $request->nama_pembeli;
    //     $orderOffline = pemesananoffline::where('status_offline', null)
    //         ->pluck('id')->toArray();
    //     foreach ($orderOffline as $id) {
    //         pemesananoffline::where('id', $id)
    //             ->update([
    //                 'nama_pembeli' => $namapembeli,
    //                 'status_offline' => 'bayar'
    //             ]);
    //     }
    //     return redirect()->to('/kasir');
    // }

    // public function addpesananoffline(request $request)
    // {
    //     pemesananoffline::create([
    //         'menu_offline' => $request->namaproduk,
    //         'qty_offline' => $request->qty_offline,
    //         'harga_offline' => $request->hargaproduk
    //     ]);
    //     return redirect()->to('/simpanoffline');
    // }


    // public function editorderoffline(request $request, $id)
    // {
    //     $orderoffline = Orderoffline::find($id);
    //     $orderoffline->qty_offline = $request->input('qty_offline');
    //     $orderoffline->save();
    //     return redirect('keranjangoffline');
    // }

    // public function hapusorderoffline($id)
    // {
    //     Orderoffline::where('id', $id)->delete();
    //     return redirect()->back();
    // }

    // public function findidorderoffline($id)
    // {
    //     $orderoffline = Orderoffline::where('id', $id)->first();
    //     $data = [
    //         'title' => 'orderoffline',
    //         'orderoffline' => $orderoffline
    //     ];
    //     return view('pelayan.editorderanoffline', $data);
    // }

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
