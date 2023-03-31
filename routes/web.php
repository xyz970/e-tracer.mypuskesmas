<?php

use App\Helper\ExportWord;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RekamMedikController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;
use Novay\WordTemplate\WordTemplate;

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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login',[AuthController::class, 'login'])->name('login.process');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
// Route::group(['prefix'=>'petugas','as'=>'petugas.','middleware'=>'authCheck'],function(){
//     Route::get('/',[RekamMedikController::class,'index'])->name('index');
// });
Route::group(['prefix'=>'rekam-medik','as'=>'rmd.','middleware'=>['authCheck','checkRole:Petugas Rekam Medik,Kepala Puskesmas']],function(){
    Route::get('/',[RekamMedikController::class,'index'])->name('index');
    Route::get('/json/data',[RekamMedikController::class,'getData'])->name('getData');
    Route::post('/insert',[RekamMedikController::class,'store'])->name('store')->withoutMiddleware('checkRole:Kepala Puskesmas');
});
Route::group(['prefix'=>'poli','as'=>'poli.','middleware'=>'authCheck'],function(){
    Route::get('/',[PoliController::class,'index'])->name('index');
});
Route::group(['prefix'=>'data-dokter','as'=>'dokter.','middleware'=>['authCheck','checkRole:Kepala Puskesmas']],function(){
    Route::get('/',[DokterController::class,'index'])->name('index');
    Route::post('/insert',[DokterController::class,'store'])->name('store');
});

Route::group(['prefix'=>'petugas','as'=>'petugas.','middleware'=>['authCheck','checkRole:Kepala Puskesmas']],function(){
    Route::get('/',[PetugasController::class,'index'])->name('index');
    Route::post('/insert',[PetugasController::class,'store'])->name('store');
});
Route::group(['prefix'=>'peminjaman','as'=>'peminjaman.','middleware'=>['authCheck']],function(){
    Route::get('/',[PeminjamanController::class, 'index'])->name('index');
    Route::post('/store',[PeminjamanController::class, 'store'])->name('store');
});
Route::group(['prefix'=>'pengembalian','as'=>'pengembalian.','middleware'=>['authCheck']],function(){
    Route::get('/',[PengembalianController::class, 'index'])->name('index');
    Route::post('/store',[PengembalianController::class, 'store'])->name('store');
});
Route::get('/test',[DokterController::class,'test']);
