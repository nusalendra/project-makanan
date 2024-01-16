<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Lokasi;
use App\Models\tambahmakanan;
use App\Models\keranjang;
use App\Models\KeranjangPembayaran;
use App\Models\pemesananoffline;
use App\Models\Pembayaran;
use App\Models\validasibayar;
use App\Models\Pembeli;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\PembeliPesananOffline;
use App\Models\PesananOffline;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function indexadmin()
    {
        $user = Auth::user();
        $tambahmakanan = tambahmakanan::all();
        return view('admin.homeadmin', compact('tambahmakanan', 'user'));
    }

    public function tambahMenu(request $request)
    {
        $tambahmakanan = tambahmakanan::all();
        return view('admin.tambah-menu', compact('tambahmakanan'));
    }

    public function tambahpegawai(request $request)
    {
        $user = Auth::user();
        $data = user::Orwhere('role', '=', 'Pemilik')
            ->Orwhere('role', '=', 'Kasir')
            ->Orwhere('role', '=', 'Koki')
            ->Orwhere('role', '=', 'Pelayan')
            ->get();

        return view('admin.tambahpegawai', compact('data', 'user'));
    }

    public function addmakanan(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'no_produk' => 'required',
            'nama_prdk' => 'required',
            'kuota' => 'required',
            'harga' => 'required',
            'images' => 'required',
            // 'gambar'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();
        $image = $request->file('images');
        $destinationPath = 'makanan/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $input['images'] = "$profileImage";
        $data = tambahmakanan::create($input);
        $nama = $data->id . "" . "slider" . "." . $image->getClientOriginalExtension();
        tambahmakanan::where('id', $data->id)->update(['images' => $nama]);
        $image->move($destinationPath, $nama);
        // return $input;
        return redirect('/homeadmin');
    }

    public function hapusmakanan($id)
    {
        $tambahmakanan = tambahmakanan::find($id);

        if ($tambahmakanan) {
            File::delete('makanan/' . $tambahmakanan->images);
        }

        $tambahmakanan->delete();

        return redirect()->back();
    }

    public function editmakanan(request $request, $id)
    {
        $tambahmakanan = tambahmakanan::find($id);
        $tambahmakanan->kategori = $request->input('kategori');
        $tambahmakanan->no_produk = $request->input('nomor_produk');
        $tambahmakanan->nama_prdk = $request->input('nama_produk');
        $tambahmakanan->kuota = $request->input('kuota');
        $tambahmakanan->harga = $request->input('harga');

        $image = $request->file('gambar');
        $destinationPath = 'makanan/';
        $nama = $tambahmakanan->id . "" . "slider" . "." . $image->getClientOriginalExtension();
        $tambahmakanan->images = $nama;
        $image->move($destinationPath, $nama);

        $tambahmakanan->save();

        return redirect('/homeadmin');
    }

    public function findidmakanan($id)
    {
        $idDecrypt = Crypt::decrypt($id);

        $tambahmakanan = tambahmakanan::where('id', $idDecrypt)->first();
        $data = [
            'title' => 'tambahmakanan',
            'tambahmakanan' => $tambahmakanan
        ];
        return view('admin.edit-menu', $data);
    }

    public function datacust()
    {
        $user = Auth::user();
        $data_cust = user::where('role', '=', 'Pengguna')->get();
        return view('admin.datacust', compact('data_cust', 'user'));
    }

    public function datacustEdit($id)
    {
        $customerDecryptId = Crypt::decrypt($id);

        $customer = User::find($customerDecryptId);

        return view('admin.datacust-edit', compact('customer'));
    }

    public function datacustUpdate($id, Request $request)
    {
        $customer = User::find($id);
        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->name = $request->name;
        $customer->role = $request->role;

        $customer->save();

        return redirect('/datacust');
    }

    public function dashboard(Request $request)
    {
        $user = Auth::user();

        return view('admin.dashboard', compact('user'));
    }

    public function getDataTanggal(Request $request)
    {
        $tanggal = $request->input('filterTanggal');

        $totalPendapatanOffline = Pembeli::where('status_pembayaran', 'Sudah Bayar')
            ->whereHas('pesananOffline', function ($query) use ($tanggal) {
                $formattedTanggal = \Carbon\Carbon::createFromFormat('d-m-Y', $tanggal);
                $query->where('status_pesanan', '=', 'Pesanan Diambil')
                    ->whereDate('pembeli.created_at', '=', $formattedTanggal);
            })
            ->sum('total_harga_semua_pesanan');

        // Total Pendapatan Online
        $totalPendapatanOnline = Pembayaran::where('status', 'Diterima')
            ->whereHas('keranjang', function ($query) use ($tanggal) {
                $formattedTanggal = \Carbon\Carbon::createFromFormat('d-m-Y', $tanggal);
                $query->where('status', '=', 'Pesanan Diambil')
                    ->whereDate('pembayaran.created_at', '=', $formattedTanggal);
            })
            ->sum('total_harga_semua_pesanan');

        return response()->json([
            'totalPendapatanOffline' => $totalPendapatanOffline,
            'totalPendapatanOnline' => $totalPendapatanOnline,
        ]);
    }

    public function getDataBulan(Request $request)
    {
        $bulan = $request->input('filterBulan');

        $formattedBulan = \Carbon\Carbon::createFromFormat('m-Y', $bulan);

        $totalPendapatanOffline = Pembeli::where('status_pembayaran', 'Sudah Bayar')
            ->whereHas('pesananOffline', function ($query) use ($formattedBulan) {
                $query->where('status_pesanan', '=', 'Pesanan Diambil')
                    ->whereMonth('pembeli.created_at', $formattedBulan->format('m'))
                    ->whereYear('pembeli.created_at', $formattedBulan->format('Y'));
            })
            ->sum('total_harga_semua_pesanan');

        // Total Pendapatan Online
        $totalPendapatanOnline = Pembayaran::where('status', 'Diterima')
            ->whereHas('keranjang', function ($query) use ($formattedBulan) {
                $query->where('status', '=', 'Pesanan Diambil')
                    ->whereMonth('pembayaran.created_at', $formattedBulan->format('m'))
                    ->whereYear('pembayaran.created_at', $formattedBulan->format('Y'));
            })
            ->sum('total_harga_semua_pesanan');

        $totalPendapatanBulanan = $totalPendapatanOnline + $totalPendapatanOffline;

        return response()->json(
            [
                'totalPendapatanBulanan' => $totalPendapatanBulanan,
            ]
        );
    }

    public function reportOnline(request $request)
    {
        $user = Auth::user();
        $orderSelesaiOnline = Pembayaran::with('keranjang')
            ->whereHas('keranjang', function ($query) {
                $query->where('status', '=', 'Pesanan Diambil');
            })
            ->where('status', 'Diterima')
            ->get();

        return view('admin.report-pesanan-online', compact('orderSelesaiOnline', 'user'));
    }

    public function cetakPdfOnline()
    {
        $keranjang = Keranjang::with('pembayaran')->where('status', 'Pesanan Diambil')->get();

        $totalHargaSemuaPesanan = Pembayaran::whereHas('keranjang', function ($query) {
            $query->where('status', 'Pesanan Diambil');
        })->sum('total_harga_semua_pesanan');

        $pdf = PDF::loadView('admin/report-online-pdf', ['title' => 'Report Pesanan Online'], compact('keranjang', 'totalHargaSemuaPesanan'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('report-online.pdf');
    }

    public function detailPesananReportOnline($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);

        $data = KeranjangPembayaran::with('keranjang', 'pembayaran')
            ->where('pembayaran_id', $idDecrypt)
            ->get();

        return view('admin.detail-pesanan-report-online', compact('data', 'user'));
    }

    public function reportOffline(Request $request)
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

        return view('admin.report-pesanan-offline', compact('orderSelesaiOffline', 'user'));
    }

    public function cetakPdfOffline()
    {
        $pesananOffline = PesananOffline::with('pembeli')->where('status_pesanan', 'Pesanan Diambil')->get();

        $totalHargaSemuaPesanan = Pembeli::whereHas('pesananOffline', function ($query) {
            $query->where('status_pesanan', 'Pesanan Diambil');
        })->sum('total_harga_semua_pesanan');

        $pdf = PDF::loadView('admin/report-offline-pdf', ['title' => 'Report Pesanan Offline'], compact('pesananOffline', 'totalHargaSemuaPesanan'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('report-online.pdf');
    }

    public function detailPesananReportOffline($id)
    {
        $user = Auth::user();
        $idDecrypt = Crypt::decrypt($id);
        $data = PembeliPesananOffline::with('pesananOffline', 'pembeli')
            ->where('pembeli_id', $idDecrypt)
            ->get();

        return view('admin.detail-pesanan-report-offline', compact('data', 'user'));
    }
}
