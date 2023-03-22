<?php

use App\Helper\ExportWord;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RekamMedikController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     $file = public_path('template/surat_pernyataan.rtf');
    
//     $array = array(
//         '[NOMOR_SURAT]' => '015/BT/SK/V/2017',
//         '[PERUSAHAAN]' => 'CV. Borneo Teknomedia',
//         '[NAMA]' => 'Melani Malik',
//         '[NIP]' => '6472065508XXXX',
//         '[ALAMAT]' => 'Jl. Manunggal Gg. 8 Loa Bakung, Samarinda',
//         '[PERMOHONAN]' => 'Permohonan pengurusan pembuatan NPWP',
//         '[KOTA]' => 'Samarinda',
//         '[DIRECTOR]' => 'Noviyanto Rahmadi',
//         '[TANGGAL]' => date('d F Y'),
//     );

//     $nama_file = 'surat-keterangan-kerja.doc';
//     $exp = new ExportWord;
//     return $exp->export($file, $array, $nama_file);
// });
Route::group(['prefix'=>'petugas','as'=>'petugas.'],function(){
    Route::get('/',[RekamMedikController::class,'index'])->name('index');
});
Route::group(['prefix'=>'rekam-medik','as'=>'rmd.'],function(){
    Route::get('/',[RekamMedikController::class,'index'])->name('index');
    Route::get('/json/data',[RekamMedikController::class,'getData'])->name('getData');
    Route::post('/insert',[RekamMedikController::class,'store'])->name('store');
});
Route::group(['prefix'=>'poli','as'=>'poli.'],function(){
    Route::get('/',[PoliController::class,'index'])->name('index');
});
Route::group(['prefix'=>'data-dokter','as'=>'dokter.'],function(){
    Route::get('/',[DokterController::class,'index'])->name('index');
    Route::post('/insert',[DokterController::class,'store'])->name('store');
});

Route::group(['prefix'=>'petugas','as'=>'petugas.'],function(){
    Route::get('/',[PetugasController::class,'index'])->name('index');
    Route::post('/insert',[PetugasController::class,'store'])->name('store');
});
Route::group(['prefix'=>'peminjaman','as'=>'peminjaman.'],function(){
    Route::get('/',[PeminjamanController::class, 'index'])->name('index');
    Route::post('/store',[PeminjamanController::class, 'store'])->name('store');
});
Route::group(['prefix'=>'pengembalian','as'=>'pengembalian.'],function(){
    Route::get('/',[PengembalianController::class, 'index'])->name('index');
    Route::post('/store',[PengembalianController::class, 'store'])->name('store');
});
Route::get('/test',[DokterController::class,'test']);
