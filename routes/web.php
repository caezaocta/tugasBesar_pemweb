<?php

use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\LaporanPoinUnit;
use App\Http\Controllers\SkpRealisasiController;
use App\Http\Controllers\UraianPekerjaanController;
use App\Http\Controllers\UraianPekerjaanJabatanController;
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
    return redirect('/dashboard');
});


// Routes Ref Unit
//
// (note dari #snaztoz) Mungkin ini bisa dijadiin resource controller aja?
Route::get('/refunits', 'App\Http\Controllers\RefUnitsController@index'); // menampilkan data table
Route::get('/refunits/create', 'App\Http\Controllers\RefUnitsController@create'); 
Route::get('/refunits/{refUnit}', 'App\Http\Controllers\RefUnitsController@show'); // menampilkan detail data dari table berdasarkan id pegawai
Route::post('/refunits', 'App\Http\Controllers\RefUnitsController@store'); // insert data pegawai
Route::delete('/refunits/{refUnit}', 'App\Http\Controllers\RefUnitsController@destroy'); // hapus data pegawai
Route::get('/refunits/{refUnit}/edit', 'App\Http\Controllers\RefUnitsController@edit'); // edit data pegawai
Route::patch('/refunits/{refUnit}', 'App\Http\Controllers\RefUnitsController@update'); // menangkap data lama dan baru


// Routes SKP Target
//
// (note dari #snaztoz) Mungkin ini bisa dijadiin resource controller aja?
Route::get('/skptargets', 'App\Http\Controllers\SkpTargetsController@index');
Route::get('/skptargets/create', 'App\Http\Controllers\SkpTargetsController@create');
Route::get('/skptargets/{skpTarget}', 'App\Http\Controllers\SkpTargetsController@show');
Route::post('/skptargets', 'App\Http\Controllers\SkpTargetsController@store'); 
Route::delete('/{skpTarget}', 'App\Http\Controllers\SkpTargetsController@destroy');
Route::get('/skptargets/{skpTarget}/edit', 'App\Http\Controllers\SkpTargetsController@edit');
Route::patch('/skptargets/{skpTarget}', 'App\Http\Controllers\SkpTargetsController@update');


// routes untuk daftar pegawai dan poin dalam jumlah tertentu
// Route::get('/perolehanpoin', 'App\Http\Controllers\SkpTargetsController@index');
 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('uraian-pekerjaan', UraianPekerjaanController::class)
        ->except(['show']);


Route::resource('skp-realisasi', SkpRealisasiController::class)
        ->only(['index', 'edit', 'update']);


Route::resource('uraian-pekerjaan-jabatan', UraianPekerjaanJabatanController::class)
        ->except(['show']);


Route::prefix('downloads')->group(function () {

    Route::get('/bukti-skp-realisasi/{id_skp_realisasi}', [
        DownloadsController::class,
        'bukti_skp_realisasi'
    ])->name('download-bukti-skp-realisasi');
});


Route::prefix('laporan')->group(function () {

    Route::get('/perolehan-poin-tiap-unit', LaporanPoinUnit::class)
            ->name('perolehan-poin-tiap-unit');
});


// Routes pegawai
//
// (note dari #snaztoz) Mungkin ini bisa dijadiin resource controller aja?
Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index');
Route::get('/pegawai/create', 'App\Http\Controllers\PegawaiController@create');
Route::get('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@show');
Route::post('/pegawai', 'App\Http\Controllers\PegawaiController@store');
Route::delete('pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@destroy');
Route::get('/pegawai/{pegawai}/edit', 'App\Http\Controllers\PegawaiController@edit');
Route::patch('/pegawai/{pegawai}', 'App\Http\Controllers\PegawaiController@update');


require __DIR__.'/auth.php';
