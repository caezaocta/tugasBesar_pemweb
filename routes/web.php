<?php

use App\Http\Controllers\UraianPekerjaanController;
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


// routes untuk home
Route::get('/home', 'App\Http\Controllers\HomeController@index');

// routes untuk refunits
Route::get('/refunits', 'App\Http\Controllers\RefUnitsController@index'); // menampilkan data table
Route::get('/refunits/create', 'App\Http\Controllers\RefUnitsController@create'); 
Route::get('/refunits/{refUnit}', 'App\Http\Controllers\RefUnitsController@show'); // menampilkan detail data dari table berdasarkan id pegawai
Route::post('/refunits', 'App\Http\Controllers\RefUnitsController@store'); // insert data pegawai
Route::delete('/refunits/{refUnit}', 'App\Http\Controllers\RefUnitsController@destroy'); // hapus data pegawai
Route::get('/refunits/{refUnit}/edit', 'App\Http\Controllers\RefUnitsController@edit'); // edit data pegawai
Route::patch('/refunits/{refUnit}', 'App\Http\Controllers\RefUnitsController@update'); // menangkap data lama dan baru

// Route::resource('refunits', 'App\Http\Controllers\RefUnitsController');

// routes untuk skptargets
Route::get('/skptargets', 'App\Http\Controllers\SkpTargetsController@index');
Route::get('/skptargets/create', 'App\Http\Controllers\SkpTargetsController@create');
Route::get('/skptargets/{skpTarget}', 'App\Http\Controllers\SkpTargetsController@show');
Route::post('/skptargets', 'App\Http\Controllers\SkpTargetsController@store'); // insert data pegawai
Route::delete('/skptargets/{skpTarget}', 'App\Http\Controllers\SkpTargetsController@destroy');
Route::get('/skptargets/{skpTarget}/edit', 'App\Http\Controllers\SkpTargetsController@edit');
Route::patch('/skptargets/{skpTarget}', 'App\Http\Controllers\SkpTargetsController@update');
 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('uraian-pekerjaan', UraianPekerjaanController::class)
        ->except(['show']);

require __DIR__.'/auth.php';
