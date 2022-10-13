<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\RencanaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananController;
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

// route perencanaan
Route::middleware('auth')->group(function ()
{
    //Dashboard
    Route::get('Dashboard', [RencanaController::class, 'dashboard']);

    //route DIPA
    Route::get('/Home/DIPA', [RencanaController::class, 'index']);

    Route::get('/Home/DIPA/Create', [RencanaController::class, 'create']);

    Route::post('/Home/DIPA', [RencanaController::class, 'store']);

    Route::get('/Home/DIPA/hapus/{id}', [RencanaController::class, 'delete']);

    Route::get('/Home/DIPA/Edit/{id}', [RencanaController::class, 'edit']); 

    Route::post('/Home/DIPA/Edit', [RencanaController::class, 'edit_perencanaan']);

    Route::get('/Home/DIPA/show/{id}', [RencanaController::class, 'show']);

    //route PBJ
    Route::get('/Home/pbj2/Edit/{id}', [RencanaController::class, 'edit2']); 

    Route::post('/Home/pbj2/Edit', [RencanaController::class, 'edit3']);

    Route::get('/Home/pbj2', [RencanaController::class, 'index2']);

    Route::post('/Home/pbj2', [RencanaController::class, 'store2']);

    Route::get('/Home/pbj2/show/{id}', [RencanaController::class, 'show2']);

    Route::get('/Home/pbj2/show2/{id}', [RencanaController::class, 'show3']);

    Route::get('/Home/pbj2/show3/{id}', [RencanaController::class, 'show4']);

    Route::get('/Home/pbj2/print', [RencanaController::class, 'print']);

    //route RKKS
    Route::get('/Home/RKKS', [RencanaController::class, 'index3']);

    Route::get('/Home/RKKS/Create', [RencanaController::class, 'create2']);

    Route::post('/Home/RKKS', [RencanaController::class, 'store3']);

    Route::get('/Home/RKKS/hapus/{id}', [RencanaController::class, 'delete2']);

    Route::get('/Home/RKKS/Edit/{id}', [RencanaController::class, 'edit4']); 

    Route::post('/Home/RKKS/Edit', [RencanaController::class, 'edit_perencanaan2']);

    Route::get('/Home/RKKS/show/{id}', [RencanaController::class, 'show5']);
    
});

// route PPK
Route::middleware('auth')->group(function ()
{
    //dashboard
    Route::get('/Dashboard_Pengadaan',[PengadaanController::class, 'dashboard']);

    //DIPA
    Route::get('/Home/DIPA2', [PengadaanController::class, 'index']);

    Route::get('/Home/DIPA2/show/{id}', [PengadaanController::class, 'show']);

    //Rkks
    Route::get('/Home/RKKS2', [PengadaanController::class, 'index2']);

    Route::get('/Home/RKKS2/show/{id}', [PengadaanController::class, 'show2']);

    //PBJ
    Route::get('/Home/pbj', [PengadaanController::class, 'index5']);

    Route::get('/Home/pbj/Create', [PengadaanController::class, 'create2']);

    Route::post('/Home/pbj', [PengadaanController::class, 'store2']);

    Route::get('/Home/pbj/delete/{id}', [PengadaanController::class, 'delete2']);

    Route::get('/Home/pbj/Edit/{id}', [PengadaanController::class, 'edit4']); 

    Route::post('/Home/pbj/Edit', [PengadaanController::class, 'edit5']);

    Route::get('/Home/pbj/show/{id}', [PengadaanController::class, 'show4']); //RAB

    Route::get('/Home/pbj/show2/{id}', [PengadaanController::class, 'show5']); //HPS

    Route::get('/Home/pbj/show3/{id}', [PengadaanController::class, 'show6']); //KAK

    Route::get('/Home/pbj/detail/{id}', [PengadaanController::class, 'detail3']);

    Route::get('/Home/pbj/print', [PengadaanController::class, 'print']);

    //persiapan kontrak
    Route::get('/Home/Pembayaran1', [PengadaanController::class, 'index4']);

    Route::post('/Home/Pembayaran1', [PengadaanController::class, 'store']);

    Route::get('/Home/Pembayaran1/Show/{id}', [PengadaanController::class, 'show3']);

    Route::get('/Home/Pembayaran1/Show2/{id}', [PengadaanController::class, 'show9']);

    Route::get('/Home/Pembayaran1/Edit/{id}', [PengadaanController::class, 'edit2']);

    Route::post('/Home/Pembayaran1/Edit', [PengadaanController::class, 'edit3']);

    Route::get('/Home/Pembayaran1/delete/{id}', [PengadaanController::class, 'delete']);

    Route::get('/Home/Pembayaran1/Create', [PengadaanController::class, 'create']);

    Route::get('/Home/Pembayaran1/Detail/{id}',[PengadaanController::class, 'detail2']);

    Route::get('/Home/Pembayaran1/print', [PengadaanController::class, 'export']);

    //surat pesanan
    Route::get('/Home/pesanan', [PengadaanController::class, 'index3']);
    
    Route::get('/Home/pesanan/detail/{id}', [PengadaanController::class, 'detail']);

    Route::post('/Home/pesanan/detail', [PengadaanController::class, 'edit']);

    Route::get('/Home/pesanan/show/{id}', [PengadaanController::class, 'show7']);

    Route::get('/Home/pesanan/show2/{id}', [PengadaanController::class, 'show8']);

});

// route keuangan
Route::middleware('auth')->group(function ()
{
    //Dashboard
    Route::get('/Dashboard_Keuangan',[KeuanganController::class, 'dashboard']);

    //persiapan pengadaan
    Route::get('/Home/Pembayarankeu1', [KeuanganController::class, 'index']);

    Route::get('/Home/Pembayarankeu1/Edit/{id}', [KeuanganController::class, 'edit']);

    Route::post('/Home/Pembayarankeu1/Edit', [KeuanganController::class, 'edit2']);

    Route::get('/Home/Pembayarankeu1/sp2d/{id}', [KeuanganController::class, 'sp2d']);

    Route::get('/Home/Pembayarankeu1/perpajakan/{id}', [KeuanganController::class, 'perpajakan']);

    Route::get('/Home/Pembayarankeu1/pendaftaran/{id}', [KeuanganController::class, 'pengesahan']);

    Route::get('/Home/Pembayarankeu1/Detail/{id}', [KeuanganController::class, 'detail']);
});

// route pejabat pengadaan
Route::middleware('auth')->group(function ()
{
    //dashboard
    Route::get('Dashboard_pejabatPengadaan', [PesananController::class, 'dashboard']);

    //surat pesanan
    Route::get('pesanan', [PesananController::class, 'index']);

    Route::get('pesanan/detail/{id}', [PesananController::class, 'detail']);

    Route::get('pesanan/create', [PesananController::class, 'create']);

    Route::post('pesanan', [PesananController::class, 'store']);

    Route::get('pesanan/edit/{id}', [PesananController::class, 'edit']);

    Route::post('pesanan/edit', [PesananController::class, 'edit2']);

    Route::get('penawaran', [PesananController::class, 'index2']);

    Route::get('pesanan/show/{id}', [PesananController::class, 'show']);

    Route::get('pesanan/show2/{id}', [PesananController::class, 'show2']);

    Route::get('pesanan/hapus/{id}', [PesananController::class, 'delete']);
});

//route login
Route::get('/Login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/Logout', [LoginController::class, 'logout']);

Route::get('/register', [LoginController::class, 'register']);

Route::post('/register', [LoginController::class, 'store']);


// Route master admin
Route::middleware('auth')->group(function ()
{

Route::get('User', [LoginController::class, 'index2']);

Route::get('register', [LoginController::class, 'register']);

Route::post('register', [LoginController::class, 'store']);

Route::get('user/hapus/{id}', [LoginController::class, 'delete']);

Route::get('user/edit/{id}', [LoginController::class, 'edit']);

Route::post('user/edit', [LoginController::class, 'edit2']);
});