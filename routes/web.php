<?php

use App\Http\Controllers\DokterController;
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
});
Route::get('/test',[DokterController::class,'test']);
