<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RekamMedikController;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix'=>'petugas','as'=>'petugas.'],function(){
    Route::get('/',[RekamMedikController::class,'index'])->name('index');
});
Route::group(['prefix'=>'rekam-medik','as'=>'rmd.'],function(){
    Route::get('/',[RekamMedikController::class,'index'])->name('index');
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
Route::get('/test',[DokterController::class,'test']);
