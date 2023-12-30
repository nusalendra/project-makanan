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
    // Route::get('/loginuser','user_controller@loginuser');
    Route::post('/checkout', 'user_controller@checkout');
    Route::get('/detail-pesanan/{id}', 'user_controller@detailpesanan');
    Route::post('/addvalidasibayar', 'user_controller@addvalidasibayar');
    Route::get('/hapusmakanan', 'user_controller@hapusmakanan');
});

//KASIR
Route::middleware(['auth:sanctum', 'verified', 'role:Kasir'])->group(function () {
    Route::get('/kasir', 'PelayanController@indexkasir')->name('kasir');;
    Route::get('/kasironline', 'PelayanController@indexkasironline');
    Route::get('/detailpesanan', 'PelayanController@indexdetailpesanan');
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
    Route::get('/riwayatdt', 'AdminController@riwayatdt');
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

Route::middleware(['auth:sanctum', 'verified', 'role:Karyawan'])->group(function () {
    //KARYAWAN
    Route::post('/addpemesanan', 'karyawan_controller@addpemesanan');
    Route::get('/loginkaryawan', 'karyawan_controller@loginkaryawan');
    Route::get('/deletepemesanan/{id}', 'karyawan_controller@deletepemesanan');
    Route::get('/datamakanan', 'karyawan_controller@makanan');
    Route::get('/dataminuman', 'karyawan_controller@formminuman');
    Route::get('/datasnack', 'karyawan_controller@datasnack');
    Route::get('/simpan', 'karyawan_controller@simpan');
    Route::get('/homekaryawan', 'karyawan_controller@homekaryawan');
    Route::get('/pesananmasuk', 'karyawan_controller@pesananmasuk');
});

//KOKI
Route::middleware(['auth:sanctum', 'verified', 'role:Koki'])->group(function () {
    Route::get('/koki', 'koki_controller@koki')->name('homekoki');
    Route::get('/kokioffline', 'koki_controller@kokioffline');
    Route::get('/loginkoki', 'koki_controller@loginkoki');
    Route::get('/orderselesaikoki', 'koki_controller@orderselesaikoki');
    Route::get('/editstatus/{id}', 'koki_controller@editstatus')->name('editstatus');
    Route::get('/editstatusoffline/{id}', 'koki_controller@editstatusoffline')->name('editstatusoffline');
});

//PELAYAN
Route::middleware(['auth:sanctum', 'verified', 'role:Pelayan'])->group(function () {
    Route::get('/orderonline', 'PelayanController@indexpelayan');
    Route::get('/orderoffline', 'PelayanController@indexpelayanoffline')->name('homepelayan');
    Route::get('/keranjangoffline', 'PelayanController@keranjangoffline');
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
