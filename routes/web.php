<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;

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


// login register
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/store/register', [AuthController::class, 'storeregister']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/store/login', [AuthController::class, 'storelogin']);
});



Route::middleware(['auth'])->group(function(){


    // dashboard masyarakat
    Route::get('/dashboard_masyarakat',[MasyarakatController::class,'dashboard']);
    // dashboard admin
    Route::get('/dashboard',[DashboardController::class,'index']);

    // pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('/tambah_pegawai', [PegawaiController::class, 'create']);
    Route::post('/store/pegawai', [PegawaiController::class, 'store']);
    Route::get('/edit_pegawai/{id}', [PegawaiController::class, 'edit']);
    Route::post('/update/pegawai/{id}', [PegawaiController::class, 'update']);
    Route::delete('/destroy_petugas/{id}', [PegawaiController::class, 'destroy'])->name('petugas.destroy');


    // pengaduan /laporan



    // masyarakat
    Route::get('/masyarakat',[MasyarakatController::class,'index']);
    Route::get('/tambah_masyarakat',[MasyarakatController::class,'create']);
    Route::post('/store/masyarakat',[MasyarakatController::class,'store']);
    Route::get('/edit_masyarakat/{id}',[MasyarakatController::class,'edit']);
    Route::post('/update_masyarakat/{id}', [MasyarakatController::class, 'update']);
    Route::get('tanggapandariadmin/{id}', [MasyarakatController::class, 'data_tanggapan']);





    // kategori
    Route::get('/kategori',[KategoriController::class,'index']);
    Route::get('/tambah_kategori',[KategoriController::class,'create']);
    Route::post('/store/kategori',[KategoriController::class,'store']);
    Route::get('/edit_kategori/{id}',[KategoriController::class,'edit']);
    Route::post('/update_kategori/{id}',[KategoriController::class,'update']);
    Route::delete('/destroy_kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // profile
    Route::get('/profile',[DashboardController::class,'profil']);


    // pengaduan
    Route::get('/laporan',[PengaduanController::class,'index']) ->name('laporan');
    Route::get('/tambah_laporan',[PengaduanController::class,'tambah']);
    Route::post('/store/laporan', [PengaduanController::class,'store']);
    Route::get('/edit_laporan/{id}',[PengaduanController::class,'edit']);
    Route::post('/update/laporan/{id}',[PengaduanController::class,'update']);
    Route::delete('/destroy_pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('destroy_pengaduan');


    Route::get('data_tanggapan', [PengaduanController::class, 'tanggapan'])->name('tanggapan.index');
    Route::get('/tambah_tanggapan/{id}', [PengaduanController::class, 'createtanggapan']);
    Route::post('/update_tanggapan/{id}', [PengaduanController::class, 'updateTanggapan']);
    Route::post('/update/data_pengaduan/{id}', [PengaduanController::class, 'update']);
    Route::get('/edit_tanggapan/{id}', [PengaduanController::class, 'editing']);
    Route::delete('/destroy_tanggapan/{id}', [PengaduanController::class, 'hapus'])->name('tanggapan.destroy');


    Route::get('/generate',[PengaduanController::class,'report'])->name('pengaduan.laporan');
    Route::get('/formulir_laporan/{id}', [PengaduanController::class, 'formulir']);

    Route::get('/indexx',function(){
        return view('index');
    });


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


