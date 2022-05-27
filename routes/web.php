<?php

use App\Http\Controllers\AggiungiDatiCorsiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncorporandiVfp1Controller;
use App\Http\Controllers\IncorporandiNMRSController;
use App\Http\Controllers\ListaPersonaleCorsiController;
use App\Http\Controllers\GestionePersonaleCorsiController;
use App\Http\Controllers\AdminJuniorCorsiController;
use App\Http\Controllers\AdminCorsiController;
use App\Http\Controllers\relazioneIncorporamentoController;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

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

Route::get('/', function(){
    if(!Auth::user()){
        return view('welcome');
    } else {
        return RouteServiceProvider::HOME(Auth::user(),null);
    }
});

Route::get('/standby', function (){
    return view('standby');
})->name('standby');


Route::prefix('/corsi')->group(function(){
    Route::prefix('/22-nmrs')->group(function() {
        Route::prefix('/admin')->group(function () {
            Route::get('home', [AdminCorsiController::class, 'view'])->middleware('auth')->name('homeCorsiAdmin22NMRS');
            Route::get('/gestione-personale-corsi', [AdminCorsiController::class,'gestionePersonale'])->middleware('auth')->name('gestionePersonale22NMRS');
            Route::post('/gestione-personale-corsi', [AdminCorsiController::class,'modificaPermessi'])->middleware('auth')->name('gestionePersonale22NMRS');
            Route::get('aggiungi-dati-corsi', [AdminCorsiController::class,'aggiungiDatiCorsi'])->middleware('auth')->name('aggiungidaticorsi22NMRS');
            Route::post('aggiungi-dati-corsi', [AdminCorsiController::class, 'inserimentoDati'])->middleware('auth')->name('inserimentoDatiAdmin22NMRS');
            Route::get('schede-individuali', [AdminCorsiController::class,'schedeIndividualiAllievi'])->middleware('auth')->name('schedeIndividuali22NMRS');
            Route::post('schede-individuali', [AdminCorsiController::class,'ricercaSchedaIndividuale'])->middleware('auth')->name('schedeIndividuali22NMRS');
            Route::get('scheda-allievo/{id}', [AdminCorsiController::class, 'downloadSchedaIndividuale'])->middleware('auth')->name('downloadScheda22NMRS');
            Route::get('visualizza-scheda-allievo/{id}', [AdminCorsiController::class, 'visualizzaSchedaIndividuale'])->middleware('auth')->name('visualizzaScheda22NMRS');
            Route::get('/', [AdminCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative22NMRS');
            Route::prefix('/schede-riepilogative')->group(function () {
                Route::get('/', [AdminCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative22NMRS');
                Route::get('/Relazione-fine-incorporamento',[relazioneIncorporamentoController::class,'relazioneAnno'])->middleware('auth')->name('relazioneFineIncorpormaneto');
                //Route::get('/Relazione-fine-incorporamento-per-area',[relazioneIncorporamentoController::class,'relazioneArea'])->middleware('auth')->name('relazioneFineIncorpormanetoperArea');
            });
            Route::get('inserisci-provvedimento-disciplinare', [AdminCorsiController::class, 'inserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdmin');
            Route::get('modifica-dati-allievi/{id?}', [AdminCorsiController::class, 'modificaDatiAllievi'])->middleware('auth')->name('modificaDatiAdmin22NMRS');
            Route::post('modifica-dati-allievi/', [AdminCorsiController::class, 'aggiornaDatiAllievo'])->middleware('auth')->name('aggiornaDatiAllievoAdmin');

            Route::prefix('/sezione-disciplinare')->group(function () {
                Route::get('/', [AdminCorsiController::class, 'sezioneDisciplinare'])->middleware('auth')->name('disciplinareAdmin');
                Route::get('inserisci-provvedimento-disciplinare', [AdminCorsiController::class, 'paginaInserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdmin');
                Route::post('inserisci-provvedimento-disciplinare', [AdminCorsiController::class, 'inserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdmin');
                Route::get('modifica-provvedimento-disciplinare/{id?}', [AdminCorsiController::class, 'paginaModificaDisciplinare'])->middleware('auth')->name('modificaProvDAdmin');
                Route::post('modifica-provvedimento-disciplinare/', [AdminCorsiController::class, 'aggiornaProvvedimentoD'])->middleware('auth')->name('aggiornaProvDAdmin22NMRS');
                Route::get('visualizza-provvedimento-disciplinare', [AdminCorsiController::class, 'paginaVisualizzaDisciplinare'])->middleware('auth')->name('visualizzaDisciplinareAdmin');
            });

            Route::prefix('/sezione-sanitaria')->group(function () {
                Route::get('/', [AdminCorsiController::class, 'sezioneSanitaria'])->middleware('auth')->name('sanitariaAdmin');
                Route::get('inserisci-provvedimento-sanitario', [AdminCorsiController::class, 'paginaInserisciSanitataria'])->middleware('auth')->name('inserisciSanitariaAdmin');
                Route::post('inserisci-provvedimento-sanitario', [AdminCorsiController::class, 'inserisciSanitaria'])->middleware('auth')->name('inserisciSanitariaAdmin');
                Route::get('modifica-provvedimento-sanitario/{id?}', [AdminCorsiController::class, 'paginaModificaSanitaria'])->middleware('auth')->name('modificaProvAdmin');
                Route::post('modifica-provvedimento-sanitario/', [AdminCorsiController::class, 'aggiornaProvvedimento'])->middleware('auth')->name('aggiornaProvAdmin22NMRS');
                Route::get('visualizza-provvedimento-sanitario', [AdminCorsiController::class, 'paginaVisualizzaSanitaria'])->middleware('auth')->name('visualizzaSanitariaAdmin');

            });
            Route::get('sezione-studi', [AdminCorsiController::class, 'sezioneStudi'])->middleware('auth')->name('studiAdmin');
        });
        Route::prefix('/adminJ')->group(function () {
            Route::get('home', [AdminJuniorCorsiController::class, 'view'])->middleware('auth')->name('homeCorsiAdminJunior22NMRS');
            Route::get('aggiungi-dati-corsi', [AdminJuniorCorsiController::class,'aggiungiDatiCorsi'])->middleware('auth')->name('aggiungidaticorsi22NMRS');
            Route::post('aggiungi-dati-corsi', [AdminJuniorCorsiController::class, 'inserimentoDati'])->middleware('auth')->name('inserimentoDatiAdminJunior22NMRS');
            Route::get('schede-individuali', [AdminJuniorCorsiController::class,'schedeIndividualiAllievi'])->middleware('auth')->name('schedeIndividuali22NMRS');
            Route::post('schede-individuali', [AdminJuniorCorsiController::class,'ricercaSchedaIndividuale'])->middleware('auth')->name('schedeIndividualiAdminJunior22NMRS');
            Route::get('/schede-riepilogative', [AdminJuniorCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative22NMRS');
            Route::get('modifica-dati-allievi/{id?}', [AdminJuniorCorsiController::class, 'modificaDatiAllievi'])->middleware('auth')->name('modificaDati22NMRS');
            Route::post('modifica-dati-allievi/', [AdminJuniorCorsiController::class, 'aggiornaDatiAllievo'])->middleware('auth')->name('aggiornaDatiAllievo');
        });
    });
});







/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */






require __DIR__.'/auth.php';
