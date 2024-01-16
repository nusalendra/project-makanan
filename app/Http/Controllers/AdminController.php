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

    public function loginadmin(request $request)
    {
        return view('admin.loginadmin');
    }

    public function tambahMenu(request $request)
    {
        $tambahmakanan = tambahmakanan::all();
        return view('admin.tambah-menu', compact('tambahmakanan'));
    }

    public function tambahlokasi(request $request)
    {
        $user = Auth::user();
        $data_lokasi = lokasi::all();
        return view('admin.tambahlokasi', compact('data_lokasi', 'user'));
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

    public function editpegawai(request $request, $id)
    {
        $data_pegawai = pegawai::find($id);
        $data_pegawai->nip = $request->input('nip');
        $data_pegawai->nama_pegawai = $request->input('nama_pegawai');
        $data_pegawai->username = $request->input('username');
        $data_pegawai->password = $request->input('password');
        $data_pegawai->lokasi_penempatan = $request->input('lokasi_penempatan');
        $data_pegawai->save();
        return redirect('tambahpegawai');
    }

    public function findidpegawai($id)
    {
        $data_pegawai = pegawai::where('id', $id)->first();
        $data = [
            'title' => 'pegawai',
            'data_pegawai' => $data_pegawai
        ];
        return view('admin.editpegawai', $data);
    }

    public function hapuspegawai($id)
    {
        pegawai::where('id', $id)->delete();
        return redirect()->back();
    }

    public function addlokasi(request $request)
    {
        lokasi::create($request->all());
        return redirect('tambahlokasi')->with('sukses', 'penambahan telah berhasil!');
    }

    public function editlokasi(request $request, $id)
    {
        $user = Auth::user();
        $data_lokasi = lokasi::find($id);
        $data_lokasi->kode = $request->input('kode');
        $data_lokasi->nama_lokasi = $request->input('nama_lokasi');
        $data_lokasi->jalan = $request->input('jalan');
        $data_lokasi->save();
        return redirect('tambahlokasi', 'user');
    }

    public function findidlokasi($id)
    {
        $data_lokasi = lokasi::where('id', $id)->first();
        $data = [
            'title' => 'lokasi',
            'data_lokasi' => $data_lokasi
        ];
        return view('admin.editlokasi', $data);
    }

    public function hapuslokasi($id)
    {
        lokasi::where('id', $id)->delete();
        return redirect()->back();
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

    public function editstatusadmin(request $request, $id)
    {
        $item = validasibayar::find($id);
        $item->status = $request->input('status');
        $item->save();
        return redirect('/validasibayar');
    }

    public function indexvalidasi(request $request)
    {
        $data = DB::table('keranjang')
            ->join('validasibayar', 'validasibayar.id', '=', 'keranjang.id')
            ->join('pembayaran', 'pembayaran.id', '=', 'validasibayar.id')
            ->get();
        return view('admin.validasibayar')->with('data', $data);
    }

    public function hitungpemasukanonline(request $request)
    {
        $operasi = $request->input('operasi');
        $bil_pertama = $request->input('bil_1');
        $bil_kedua = $request->input('bil_2');
        $result = $bil_pertama + $bil_kedua;

        // if($operasi == "tambah"){
        //     $result = $bil_pertama + $bil_kedua;
        // }

        return redirect('dashboard')->with('info', 'pemasukkan online anda : ' . $result);
    }

    public function hitungpemasukanoffline(request $request)
    {
        $operasi = $request->input('operasi');
        $bil_pertama = $request->input('bil_1');
        $bil_kedua = $request->input('bil_2');
        $result = $bil_pertama + $bil_kedua;

        return redirect('dashboard')->with('info', 'pemasukkan offline anda : ' . $result);
    }
}
