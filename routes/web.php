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
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Novay\WordTemplate\WordTemplate;
use Pusher\Pusher;

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
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::group(['prefix'=>'petugas','as'=>'petugas.','middleware'=>'authCheck'],function(){
//     Route::get('/',[RekamMedikController::class,'index'])->name('index');
// });
Route::group(['prefix' => 'rekam-medik', 'as' => 'rmd.', 'middleware' => ['authCheck', 'checkRole:Petugas Rekam Medik,Kepala Puskesmas,Petugas Poli']], function () {
    Route::get('/', [RekamMedikController::class, 'index'])->name('index');
    Route::get('/json/data', [RekamMedikController::class, 'getData'])->name('getData');
    Route::post('/insert', [RekamMedikController::class, 'store'])->name('store')->withoutMiddleware('checkRole:Kepala Puskesmas');
});
Route::group(['prefix' => 'poli', 'as' => 'poli.', 'middleware' => 'authCheck'], function () {
    Route::get('/', [PoliController::class, 'index'])->name('index');
    Route::post('/insert',[PoliController::class,'store'])->name('store');
});
Route::group(['prefix' => 'data-dokter', 'as' => 'dokter.', 'middleware' => ['authCheck', 'checkRole:Kepala Puskesmas']], function () {
    Route::get('/', [DokterController::class, 'index'])->name('index');
    Route::post('/insert', [DokterController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'petugas', 'as' => 'petugas.', 'middleware' => ['authCheck', 'checkRole:Kepala Puskesmas']], function () {
    Route::get('/', [PetugasController::class, 'index'])->name('index');
    Route::post('/insert', [PetugasController::class, 'store'])->name('store');
});
Route::group(['prefix' => 'peminjaman', 'as' => 'peminjaman.', 'middleware' => ['authCheck']], function () {
    Route::get('/', [PeminjamanController::class, 'index'])->name('index');
    Route::get('/verifikasi/{id}', [PeminjamanController::class, 'verifikasi_peminjaman'])->name('verifikasi_peminjaman');
    Route::post('/store', [PeminjamanController::class, 'store'])->name('store');
    Route::post('/export', [PeminjamanController::class, 'export'])->name('export');
});
Route::group(['prefix' => 'pengembalian', 'as' => 'pengembalian.', 'middleware' => ['authCheck']], function () {
    Route::get('/', [PengembalianController::class, 'index'])->name('index');
    Route::post('/store', [PengembalianController::class, 'store'])->name('store');
    Route::get('verifikasi/{id}', [PengembalianController::class, 'verifikasi_pengembalian'])->name('verifikasi_pengembalian');
});
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware(AuthCheck::class);
Route::get('/test', [DokterController::class, 'test']);

Route::get('tes/notif', function () {
    $auth = Auth::user();
    $pengembalian = Peminjaman::where('user_id', '=', $auth->id)->where('waktu_pengembalian', '=', null)->first();
    // dd($pengembalian->created_at);
    if (!empty($pengembalian)) {
        $created_at = Carbon::createFromTimeString($pengembalian->created_at)->addDay();
        // dd($pengembalian->user_id);
        if ($created_at <= Carbon::now()) {
            $data = array(
                // 'id_peminjaman' => $pengembalian->id,
                'peminjaman' => $pengembalian,
                // 'user' => $auth
            );
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                array('cluster' => env('PUSHER_APP_CLUSTER'))
            );
            $pusher->trigger(
                'notifikasi-keterlambatan.' . $pengembalian->user_id,
                'my-event',
                $data
            );
            // dispatch(new SendEmail($auth['email']));
        }
    }
});
