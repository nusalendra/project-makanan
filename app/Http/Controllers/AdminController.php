<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Lokasi;
use App\Models\tambahmakanan;
use App\Models\keranjang;
use App\Models\pemesananoffline;
use App\Models\Pembayaran;
use App\Models\validasibayar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function tambahmakanan(request $request)
    {
        $tambahmakanan = tambahmakanan::all();
        return view('admin.tambahmakanan', compact('tambahmakanan'));
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

    public function formtambahpegawai() {
        return view('admin.formtambahpegawai');
    }

    public function addpegawai(request $request)
    {
        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt('password');
        $user->role = $request->role;
        // dd($user);
        $user->save();
        
        return redirect('tambahpegawai')->with('sukses', 'penambahan telah berhasil!');
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
        tambahmakanan::where('id', $id)->delete();
        return redirect()->back();
    }

    public function editmakanan(request $request, $id)
    {
        $tambahmakanan = tambahmakanan::find($id);
        $tambahmakanan->kategori = $request->input('kategori');
        $tambahmakanan->no_produk = $request->input('no_produk');
        $tambahmakanan->nama_prdk = $request->input('nama_prdk');
        $tambahmakanan->qty = $request->input('qty');
        $tambahmakanan->harga = $request->input('harga');
        $tambahmakanan->images = $request->input('images');
        $tambahmakanan->save();
        return redirect('/homeadmin');
    }

    public function findidmakanan($id)
    {
        $tambahmakanan = tambahmakanan::where('id', $id)->first();
        $data = [
            'title' => 'tambahmakanan',
            'tambahmakanan' => $tambahmakanan
        ];
        return view('admin.editmakanan', $data);
    }

    public function datacust()
    {
        $user = Auth::user();
        $data_cust = user::where('role', '=', 'Pengguna')->get();
        return view('admin.datacust', compact('data_cust', 'user'));
    }

    public function dashboard(request $request)
    {
        $user = Auth::user();
        $keranjang = keranjang::all();
        $pemesananoffline = pemesananoffline::all();
        $total_orderan_online = keranjang::selectraw("sum(harga*qty) as totalorderan")->first();
        $total_orderan_offline = pemesananoffline::selectraw("sum(harga_offline*qty_offline) as totalorderan")->first();
        return view('admin.dashboard', compact('user' ,'pemesananoffline', 'keranjang', 'total_orderan_online', 'total_orderan_offline'));
    }

    public function riwayatdt(request $request)
    {
        $user = Auth::user();
        $pemesananoffline = pemesananoffline::all();
        $data = DB::table('keranjang')
            ->join('pembayaran', 'pembayaran.id', '=', 'keranjang.id')
            ->join('validasibayar', 'validasibayar.id', '=', 'pembayaran.id')
            ->get();
        return view('admin.riwayatdt', compact('pemesananoffline','user'))->with('data', $data);
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
