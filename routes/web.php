<?php

use App\Http\Controllers\AggiungiDatiCorsiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncorporandiVfp1Controller;
use App\Http\Controllers\IncorporandiNMRSController;
use App\Http\Controllers\ListaPersonaleCorsiController;
use App\Http\Controllers\GestionePersonaleCorsiController;
use App\Http\Controllers\AdminJuniorCorsiController;

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

Route::get('home', [ListaPersonaleCorsiController::class,'up'])->middleware('auth')->name('homeCorsiAdmin');

Route::get('home', [AdminJuniorCorsiController::class,'ListaPersonale'])->middleware('auth')->name('homeCorsiAdminJunior');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('aggiungidaticorsi', [AggiungiDatiCorsiController::class,'up'])->middleware('auth')->name('aggiungidaticorsi');

Route::post('aggiungidaticorsi', [IncorporandiVfp1Controller::class, 'import'])->name('aggiungiDatiVFP1');

Route::post('aggiungidaticorsi', [IncorporandiNMRSController::class, 'import'])->name('aggiungiDatiNMRS');

Route::get('aggiungidaticorsi', [AdminJuniorCorsiController::class,'create'])->name('aggiungidaticorsi');

Route::get('/gestionepersonalecorsi', [GestionePersonaleCorsiController::class,'up'])->middleware('auth')->name('aggiungidaticorsi');
require __DIR__.'/auth.php';
