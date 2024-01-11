<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderan;
use App\Models\tambahmakanan;
use App\Models\Pembayaran;
use App\Models\Pemesananoffline;
use App\Models\keranjang;
use App\Models\KeranjangPembayaran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;



class user_controller extends Controller
{
    public function indexuser()
    {
        $user = auth()->user();
        $tambahmakanan = tambahmakanan::all();

        $keranjang = keranjang::where('user_id', $user->id)
            ->where('status', 'Dalam Keranjang')
            ->pluck('tambahmakanan_id');

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
            'qty' => 0,
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
        $user = Auth::user();

        return view('user.profil', compact('user'));
    }

    public function ubahProfil($id, Request $request)
    {
        $user = User::find($id);

        $user->password = bcrypt('password');
        $user->telepon = $request->telepon;
        $user->save();

        return redirect('/profil');
    }

    public function keranjang(request $request)
    {
        $user = Auth::user();
        $keranjang = keranjang::where('user_id', auth()->user()->id)
            ->where('status', '=', 'Dalam Keranjang')
            ->get();

        return view('user.simpanmenu', compact('keranjang', 'user'));
    }

    public function keranjangdelete($id)
    {
        $keranjang = keranjang::find($id);

        $keranjang->delete();

        return redirect('/keranjang');
    }

    public function checkout(Request $request)
    {
        $keranjangIds = $request->input('keranjangId');
        $qtys = $request->input('qty');

        $user = Auth::user();

        $user->update([
            'telepon' => $request->telepon_input,
        ]);

        $keranjangIdsToSave = [];
        $totalSemuaPesanan = 0;
        foreach ($keranjangIds as $index => $keranjangId) {
            $data = Keranjang::find($keranjangId);

            if ($data) {
                $qty = $qtys[$index];

                $data->qty = $qty;
                $data->status = 'Proses';
                $data->save();

                // Tambahkan ID keranjang ke array untuk disimpan di pivot table antara Keranjang dan Pembayaran
                $keranjangIdsToSave[] = $data->id;

                $tambahmakanan = tambahmakanan::find($data->tambahmakanan_id);
                if ($tambahmakanan) {
                    $tambahmakanan->kuota -= $qty;
                    $tambahmakanan->save();
                }
            }
            $totalSemuaPesanan += $data->qty * $data->harga;
        }

        // Simpan array ID keranjang ke dalam relasi many-to-many
        $pembayaran = new Pembayaran();
        $pembayaran->nomor_order = 'ORD_' . rand(100000000, 999999999);
        $pembayaran->metode = $request->metode;
        $pembayaran->id_pembayaran = $request->id_pembayaran;
        $pembayaran->total_harga_semua_pesanan = $totalSemuaPesanan;
        $pembayaran->status = 'Proses';
        $pembayaran->save();

        $pembayaran->keranjang()->attach($keranjangIdsToSave);

        return redirect('keranjang')->with('sukses', 'Penambahan telah berhasil!');
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

    public function riwayatPesanan(request $request)
    {
        $user = Auth::user();
        $data = Pembayaran::with('keranjang')
            ->where(function ($query) {
                $query->where('status', 'Diterima')
                    ->orWhere('status', 'Proses');
            })
            ->whereHas('keranjang', function ($query) use ($user) {
                $query->where('status', '!=', 'Pesanan Diambil');
                $query->where('user_id', '=', $user->id);
            })
            ->get();

        return view('user.riwayat-pesanan', compact('data'));
    }

    public function detailpesanan($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();

        return view('user.detail-pesanan', compact('data', 'user'));
    }

    public function cancelpesanan($id, Request $request)
    {
        $pembayaran = Pembayaran::find($id);

        $pembayaran->status = 'Pesanan Dibatalkan';
        if ($request->batalkan_pengiriman === 'Alasan Lainnya') {
            $pembayaran->alasan_pembatalan_pesanan = $request->batalkan_pengiriman_input;
        } else {
            $pembayaran->alasan_pembatalan_pesanan = $request->batalkan_pengiriman;
        }
        $pembayaran->save();

        $keranjangPembayaran = KeranjangPembayaran::where('pembayaran_id', $pembayaran->id)->get();

        foreach ($keranjangPembayaran as $item) {
            $keranjang = Keranjang::find($item->keranjang_id);

            $keranjang->status = 'Pesanan Dibatalkan';
            $keranjang->save();

            $tambahmakanan = tambahmakanan::find($keranjang->tambahmakanan_id);

            if ($tambahmakanan) {
                $tambahmakanan->kuota += $keranjang->qty;
                $tambahmakanan->save();
            }
        }

        return redirect('/riwayat-pesanan');
    }

    public function pesananDibatalkan()
    {
        $user = Auth::user();
        $data = Pembayaran::with('keranjang')
            ->where(function ($query) {
                $query->where('status', 'Pesanan Dibatalkan');
            })
            ->whereHas('keranjang', function ($query) use ($user) {
                $query->where('status', '=', 'Pesanan Dibatalkan');
                $query->where('user_id', '=', $user->id);
            })
            ->get();

        return view('user.pesanan-dibatalkan', compact('data'));
    }

    public function detailPesananDibatalkan($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();

        return view('user.detail-pesanan-dibatalkan', compact('data', 'user'));
    }

    public function pesananSelesai()
    {
        $user = Auth::user();
        $data = Pembayaran::with('keranjang')
            ->whereHas('keranjang', function ($query) use ($user) {
                $query->where('status', '=', 'Pesanan Diambil');
                $query->where('user_id', '=', $user->id);
            })
            ->get();

        return view('/user.pesanan-selesai', compact('data'));
    }

    public function detailPesananSelesai($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();

        return view('user.detail-pesanan-selesai', compact('data', 'user'));
    }

    public function loginuser(request $request)
    {
        return view('user.loginuser');
    }

    // public function addvalidasibayar(request $request)
    // {
    //     validasibayar::create($request->all());
    //     return redirect('keranjang')->with('sukses', 'penambahan telah berhasil!');
    // }

    public function addpembeli(request $request)
    {
        Pemesananoffline::create($request->all());
        return redirect('simpanoffline')->with('sukses', 'penambahan telah berhasil!');
    }
}
