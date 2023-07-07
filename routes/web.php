<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\karyawan_controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\PasswordReset;

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

Route::get('/', function () {
    return view('welcome');
});


//USER
route::get('/homepage','user_controller@indexuser');
route::get('/pageminuman','user_controller@indexminum');
route::get('/pagealacarte','user_controller@indexalacarte');
route::get('/landingpage','landingpage_Controller@landingpage');

//ADMIN
route::get('/homeadmin','AdminController@indexadmin');
route::get('/loginadmin','AdminController@loginadmin');
//FUNCTION DATA MAKANAN
route::get('/tambahmakanan','AdminController@tambahmakanan');
route::get('/tambahlokasi','AdminController@tambahlokasi');
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

//KOKI
Route::get('/koki','koki_controller@koki'); 

//ADDORDERAN
route::post('/addorderan','orderan_controller@addorderan');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
