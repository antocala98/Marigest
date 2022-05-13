<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncorporandiVfp1Controller;
use App\Http\Controllers\ListaPersonaleCorsiController;
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

Route::get('/standby', function (){
    return view('standby');
})->name('standby');

Route::get('home', [ListaPersonaleCorsiController::class,'ListaPersonale'])->middleware('auth')->name('homeCorsiAdmin');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('home', [IncorporandiVfp1Controller::class, 'import'])->name('file-import');

require __DIR__.'/auth.php';
