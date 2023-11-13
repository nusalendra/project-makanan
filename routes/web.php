<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\karyawan_controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\orderan_controller;
use App\Http\Controllers\Auth\LoginController;

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


//USER
route::get('/homepage','user_controller@indexuser')->name('homepages');
route::post('/addtoCart','user_controller@addtoCart');
route::get('/pageminuman','user_controller@indexminum');
route::get('/pagealacarte','user_controller@indexalacarte');
route::get('/','landingpage_Controller@landingpage');
route::get('/profil','user_controller@profil');
route::get('/menu','user_controller@menu');
route::get('/keranjang','user_controller@keranjang');
route::get('/editkeranjang/{id}','user_controller@editkeranjang')->name('editkeranjang');
route::get('/prosesviewdatakeranjang/{id}','user_controller@findidkeranjang');
route::get('/invoice','user_controller@invoice');
route::get('/selesai','user_controller@selesai');
// route::get('/loginuser','user_controller@loginuser');
route::view('/loginuser','user.loginuser');
route::post('/addpembayaran','user_Controller@addpembayaran');
route::get('/hapusmakanan','user_controller@hapusmakanan');

//KASIR
route::get('/kasir','PelayanController@indexkasir')->name('kasir');;
route::get('/kasironline','PelayanController@indexkasironline');
route::get('/detailpesanan','PelayanController@indexdetailpesanan');
route::post('/kembalian','PelayanController@hitungkembalian');
route::get('/invoicekasir','PelayanController@invoice');
//Generate PDF Invoice
route::get('/downloadPDF/cetakinvoice',[App\Http\Controllers\PelayanController::class, 'download_invoice'])->name('downloadpdf_invoice');
route::get('/downloadPDF/cetakinvoicekasir',[App\Http\Controllers\PelayanController::class, 'download_kasir'])->name('downloadpdf_kasir');
//ADMIN
route::post('/hitungpendapatan','AdminController@hitungpemasukan');
route::get('/homeadmin','AdminController@indexadmin')->name('homeadmin');
route::get('/loginadmin','AdminController@loginadmin');
route::get('/datacust','AdminController@datacust');
route::get('/dashboard','AdminController@dashboard');
route::get('/riwayatdt','AdminController@riwayatdt');

//FUNCTION DATA MAKANAN
route::get('/tambahmakanan','AdminController@tambahmakanan');
route::get('/tambahlokasi','AdminController@tambahlokasi');
route::post('/addmakanan','AdminController@addmakanan');
route::get('/hapusmakanan/{id}','AdminController@hapusmakanan');
route::get('/editmakanan/{id}','AdminController@editmakanan')->name('editmakanan');
route::get('/prosesviewdatamakanan/{id}','AdminController@findidmakanan');

//FUNCTION DATA LOKASI
route::post('/addlokasi','AdminController@addlokasi');
route::get('/editlokasi/{id}','AdminController@editlokasi')->name('editlokasi');
route::get('/prosesviewdatalokasi/{id}','AdminController@findidlokasi');
route::get('/deletelokasi/{id}','AdminController@hapuslokasi');

//FUNCTION DATA PEGAWAI
route::get('/tambahpegawai','AdminController@tambahpegawai');
route::post('/addpegawai','AdminController@addpegawai');
route::get('/editpegawai/{id}','AdminController@editpegawai')->name('editpegawai');
route::get('/prosesviewdata/{id}','AdminController@findidpegawai');
route::get('/deletepegawai/{id}','AdminController@hapuspegawai');

//KARYAWAN
route::post('/addpemesanan','karyawan_controller@addpemesanan');
route::get('/loginkaryawan','karyawan_controller@loginkaryawan');
route::get('/deletepemesanan/{id}','karyawan_controller@deletepemesanan');
Route::get('/datamakanan','karyawan_controller@makanan'); 
route::get('/dataminuman','karyawan_controller@formminuman');
route::get('/datasnack','karyawan_controller@datasnack');
route::get('/simpan','karyawan_controller@simpan');
route::get('/homekaryawan','karyawan_controller@homekaryawan');
route::get('/pesananmasuk','karyawan_controller@pesananmasuk');

//KOKI
Route::get('/koki','koki_controller@koki')->name('homekoki');
Route::get('/kokioffline','koki_controller@kokioffline');
Route::get('/loginkoki','koki_controller@loginkoki');  
Route::get('/orderselesaikoki','koki_controller@orderselesaikoki');  

//PELAYAN
route::get('/orderonline','PelayanController@indexpelayan');
route::get('/orderoffline','PelayanController@indexpelayanoffline')->name('homepelayan');
route::get('/keranjangoffline','PelayanController@keranjangoffline');
route::post('/addorderoffline','PelayanController@addorderoffline');
route::get('/hapusorderoffline/{id}','PelayanController@hapusorderoffline');
route::get('/editorderoffline/{id}','PelayanController@editorderoffline')->name('editorderoffline');
route::get('/prosesviewdataorderoffline/{id}','PelayanController@findidorderoffline');
route::get('/loginpelayan','PelayanController@loginpelayan');
route::get('/selesaiorderall','PelayanController@selesaiorderall');

//ADDORDERANl
route::post('/addorderan','orderan_controller@addorderan');
route::get('/hapusorderan/{id}','orderan_controller@hapusorderan');
route::get('/prosesviewdataorderan/{id}','orderan_controller@findidorderan');
route::get('/editorderan/{id}','orderan_controller@editorderan')->name('editorderan');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/login',[LoginController::class,'Login'])->name('user.login');
Route::post('logout',[LoginController::class,'logout'])->name('logout');
