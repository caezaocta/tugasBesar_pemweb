<?php

use App\Http\Controllers\UraianPekerjaanController;
use App\Http\Controllers\RefUnitsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('uraian-pekerjaan', UraianPekerjaanController::class)
        ->except(['show']);

Route::resource('ref-unit', RefUnitsController::class);        

require __DIR__.'/auth.php';
