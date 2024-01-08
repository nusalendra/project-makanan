<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/login', [LoginController::class, 'Login'])->name('user.login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::view('/loginuser', 'user.loginuser');

//USER
Route::middleware(['auth:sanctum', 'verified', 'role:Pengguna'])->group(function () {
    Route::get('/', 'user_controller@indexhalamanutama');
    Route::get('/homepage', 'user_controller@indexuser')->name('homepages');
    Route::post('/addtoCart', 'user_controller@addtoCart');
    Route::post('/addpembeli', 'user_controller@addpembeli');
    Route::get('/pageminuman', 'user_controller@indexminum');
    Route::get('/pagealacarte', 'user_controller@indexalacarte');
    //Route::get('/','landingpage_Controller@landingpage');
    Route::get('/profil', 'user_controller@profil');
    Route::post('/ubahprofil/{id}', 'user_controller@ubahProfil');
    Route::get('/menu', 'user_controller@menu');
    Route::get('/keranjang', 'user_controller@keranjang');
    Route::get('/keranjang/delete/{id}', 'user_controller@keranjangdelete');
    Route::get('/simpanoffline', 'user_controller@keranjangoffline');
    Route::get('/editkeranjang/{id}', 'user_controller@editkeranjang')->name('editkeranjang');
    Route::get('/editkeranjangoffline/{id}', 'user_controller@editkeranjangoffline')->name('editkeranjangoffline');
    Route::get('/prosesviewdatakeranjang/{id}', 'user_controller@findidkeranjang');
    Route::get('/invoice', 'user_controller@invoice');
    Route::get('/riwayat-pesanan', 'user_controller@riwayatPesanan');
    Route::post('/checkout', 'user_controller@checkout');
    Route::get('/riwayat-pesanan/detail-pesanan/{id}', 'user_controller@detailpesanan');
    Route::post('/riwayat-pesanan/cancel-pesanan/{id}', 'user_controller@cancelpesanan');
    Route::get('/pesanan-dibatalkan', 'user_controller@pesananDibatalkan');
    Route::get('/pesanan-dibatalkan/detail-pesanan/{id}', 'user_controller@detailPesananDibatalkan');
    Route::get('/hapusmakanan', 'user_controller@hapusmakanan');
});

//KASIR
Route::middleware(['auth:sanctum', 'verified', 'role:Kasir'])->group(function () {
    Route::get('/kasir-offline', 'PelayanController@indexkasiroffline')->name('kasir');
    Route::get('/kasir-offline/detail-pesanan/{id}', 'PelayanController@detailPesananKasirOffline');
    Route::post('/kasir-offline/pembayaran/{id}', 'PelayanController@pembayaran');
    Route::get('/kasir-online', 'PelayanController@indexkasironline');
    Route::get('/kasir-online/detail-pesanan/{id}', 'PelayanController@detailPesananKasirOnline');
    Route::post('/kasir-online/validasi-pesanan', 'PelayanController@validasiPesanan');
    Route::post('/kasir-online/tambah-ongkir', 'PelayanController@tambahOngkir');
    Route::get('/detailpesanan', 'PelayanController@indexdetailpesanan');
    Route::get('/pesanan-online-dibatalkan', 'PelayanController@pesananOnlineDibatalkan');
    Route::get('/pesanan-online-dibatalkan/detail-pesanan/{od}', 'PelayanController@detailPesananOnlineDibatalkan');
    Route::post('/kembalian', 'PelayanController@hitungkembalian');
    Route::get('/invoicekasir', 'PelayanController@invoice');
    Route::get('/harga/{id}', 'PelayanController@getHarga');
    //Generate PDF Invoice
    Route::get('/downloadPDF/cetakinvoice', [App\Http\Controllers\PelayanController::class, 'download_invoice'])->name('downloadpdf_invoice');
    Route::get('/downloadPDF/cetakinvoicekasir', [App\Http\Controllers\PelayanController::class, 'download_kasir'])->name('downloadpdf_kasir');
});

//ADMIN
Route::middleware(['auth:sanctum', 'verified', 'role:Pemilik'])->group(function () {
    Route::post('/hitungpendapatan', 'AdminController@hitungpemasukanonline');
    Route::post('/hitungpendapatanoffline', 'AdminController@hitungpemasukanoffline');
    Route::get('/homeadmin', 'AdminController@indexadmin')->name('homeadmin');
    Route::get('/loginadmin', 'AdminController@loginadmin');
    Route::get('/datacust', 'AdminController@datacust');
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/report-pesanan-online', 'AdminController@reportOnline');
    Route::get('/report-pesanan-online/cetak-pdf', 'AdminController@cetakPdfOnline');
    Route::get('/report-pesanan-online/detail-pesanan/{id}', 'AdminController@detailPesananReportOnline');
    Route::get('/report-pesanan-offline', 'AdminController@reportOffline');
    Route::get('/report-pesanan-offline/cetak-pdf', 'AdminController@cetakPdfOffline');
    Route::get('/report-pesanan-offline/detail-pesanan/{id}', 'AdminController@detailPesananReportOffline');
    Route::get('/validasibayar', 'AdminController@indexvalidasi');
    Route::get('/editstatusadmin/{id}', 'AdminController@editstatusadmin')->name('editstatusadmin');

    //FUNCTION DATA MAKANAN
    Route::get('/tambahmakanan', 'AdminController@tambahmakanan');
    Route::get('/tambahlokasi', 'AdminController@tambahlokasi');
    Route::post('/addmakanan', 'AdminController@addmakanan');
    Route::get('/hapusmakanan/{id}', 'AdminController@hapusmakanan');
    Route::get('/editmakanan/{id}', 'AdminController@editmakanan')->name('editmakanan');
    Route::get('/prosesviewdatamakanan/{id}', 'AdminController@findidmakanan');

    //FUNCTION DATA LOKASI
    Route::post('/addlokasi', 'AdminController@addlokasi');
    Route::get('/editlokasi/{id}', 'AdminController@editlokasi')->name('editlokasi');
    Route::get('/prosesviewdatalokasi/{id}', 'AdminController@findidlokasi');
    Route::get('/deletelokasi/{id}', 'AdminController@hapuslokasi');

    //FUNCTION DATA PEGAWAI
    Route::get('/tambahpegawai', 'AdminController@tambahpegawai');
    Route::get('/formtambahpegawai', 'AdminController@formtambahpegawai');
    Route::post('/addpegawai', 'AdminController@addpegawai');
    Route::get('/editpegawai/{id}', 'AdminController@editpegawai')->name('editpegawai');
    Route::get('/prosesviewdata/{id}', 'AdminController@findidpegawai');
    Route::get('/deletepegawai/{id}', 'AdminController@hapuspegawai');
});

//KOKI
Route::middleware(['auth:sanctum', 'verified', 'role:Koki'])->group(function () {
    Route::get('/koki', 'koki_controller@koki')->name('homekoki');
    Route::post('/daftar-orderan-offline/pesanan-siap', 'koki_controller@pesananSiapOffline');
    Route::get('/daftar-orderan-online/detail-pesanan/{id}', 'koki_controller@detailPesananOnline');
    Route::post('/daftar-orderan-online/pesanan-siap', 'koki_controller@pesananSiapOnline');
    Route::get('/daftar-orderan-offline/detail-pesanan/{id}', 'koki_controller@detailPesananOffline');
    Route::post('/daftar-orderan-offline/pesanan-siap', 'koki_controller@pesananSiapOffline');
    Route::get('/orderan-offline-selesai/detail-pesanan/{id}', 'koki_controller@detailPesananOfflineSelesai');
    Route::get('/orderan-online-selesai/detail-pesanan/{id}', 'koki_controller@detailPesananOnlineSelesai');
    Route::get('/kokioffline', 'koki_controller@kokioffline');
    Route::get('/loginkoki', 'koki_controller@loginkoki');
    Route::get('/orderselesaikoki', 'koki_controller@orderselesaikoki');
    Route::get('/editstatus/{id}', 'koki_controller@editstatus')->name('editstatus');
    Route::get('/editstatusoffline/{id}', 'koki_controller@editstatusoffline')->name('editstatusoffline');
});

//PELAYAN
Route::middleware(['auth:sanctum', 'verified', 'role:Pelayan'])->group(function () {
    Route::get('/orderonline', 'PelayanController@indexpelayan');
    Route::get('/menu-pelanggan', 'PelayanController@menuPelanggan')->name('homepelayan');
    Route::get('/order-offline', 'PelayanController@orderOffline');
    Route::get('/order-offline/detail-pesanan/{id}', 'PelayanController@detailPesananOffline');
    Route::post('/order-offline/pesanan-diambil', 'PelayanController@pesananDiambilOffline');
    Route::post('/tambah-keranjang', 'PelayanController@tambahKeranjang');
    Route::get('/keranjang-offline', 'PelayanController@keranjangOffline');
    Route::get('/keranjang-offline/delete/{id}', 'PelayanController@keranjangDelete');
    Route::post('/checkout-pembeli', 'PelayanController@checkoutPembeli');

    Route::get('/order-online', 'PelayanController@indexpelayanonline');
    Route::get('/order-online/detail-pesanan/{id}', 'PelayanController@detailPesananOnline');
    Route::post('/order-online/pesanan-diambil', 'PelayanController@pesananDiambilOnline');
    Route::get('/order-selesai', 'PelayanController@orderSelesai');
    Route::get('/orderan-selesai/detail-pesanan-online/{id}', 'PelayanController@detailPesananOrderanSelesaiOnline');
    Route::get('/orderan-selesai/detail-pesanan-offline/{id}', 'PelayanController@detailPesananOrderanSelesaiOffline');
    Route::put('/addorderoffline', 'PelayanController@addorderoffline');
    Route::put('/addpesananoffline', 'PelayanController@addpesananoffline');
    Route::get('/hapusorderoffline/{id}', 'PelayanController@hapusorderoffline');
    Route::get('/editorderoffline/{id}', 'PelayanController@editorderoffline')->name('editorderoffline');
    Route::get('/prosesviewdataorderoffline/{id}', 'PelayanController@findidorderoffline');
    Route::get('/loginpelayan', 'PelayanController@loginpelayan');
    Route::get('/selesaiorderall', 'PelayanController@selesaiorderall');

    //ADDORDERANl
    Route::post('/addorderan', 'orderan_controller@addorderan');
    Route::get('/hapusorderan/{id}', 'orderan_controller@hapusorderan');
    Route::get('/prosesviewdataorderan/{id}', 'orderan_controller@findidorderan');
    Route::get('/editorderan/{id}', 'orderan_controller@editorderan')->name('editorderan');
});
