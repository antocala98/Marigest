<?php

use App\Http\Controllers\AggiungiDatiCorsiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncorporandiVfp1Controller;
use App\Http\Controllers\IncorporandiNMRSController;
use App\Http\Controllers\ListaPersonaleCorsiController;
use App\Http\Controllers\GestionePersonaleCorsiController;
use App\Http\Controllers\AdminJuniorCorsiController;
use App\Http\Controllers\AdminCorsiController;
use App\Http\Controllers\AddettoCorsiController;
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
    Route::prefix('/marescialli')->group(function() {
        Route::prefix('/admin')->group(function () {
            Route::get('home', [AdminCorsiController::class, 'view'])->middleware('auth')->name('homeCorsiAdmin');
            Route::get('/gestione-personale-corsi', [AdminCorsiController::class,'gestionePersonale'])->middleware('auth')->name('gestionePersonale');
            Route::post('/gestione-personale-corsi', [AdminCorsiController::class,'modificaPermessi'])->middleware('auth')->name('gestionePersonale');
            Route::get('aggiungi-dati-corsi', [AdminCorsiController::class,'aggiungiDatiCorsi'])->middleware('auth')->name('aggiungidaticorsi');
            Route::post('aggiungi-dati-corsi', [AdminCorsiController::class, 'inserimentoDati'])->middleware('auth')->name('inserimentoDatiAdmin');
            Route::get('schede-individuali', [AdminCorsiController::class,'schedeIndividualiAllievi'])->middleware('auth')->name('schedeIndividuali');
            Route::post('schede-individuali', [AdminCorsiController::class,'ricercaSchedaIndividuale'])->middleware('auth')->name('schedeIndividuali');
            Route::get('scheda-allievo/{id}', [AdminCorsiController::class, 'downloadSchedaIndividuale'])->middleware('auth')->name('downloadScheda');
            Route::get('visualizza-scheda-allievo/{id}', [AdminCorsiController::class, 'visualizzaSchedaIndividuale'])->middleware('auth')->name('visualizzaScheda');
            Route::get('/', [AdminCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative');
            Route::prefix('/schede-riepilogative')->group(function () {
                Route::get('/', [AdminCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative');
                Route::get('/Relazione-fine-incorporamento',[relazioneIncorporamentoController::class,'relazioneAnno'])->middleware('auth')->name('relazioneFineIncorpormaneto');
                //Route::get('/Relazione-fine-incorporamento-per-area',[relazioneIncorporamentoController::class,'relazioneArea'])->middleware('auth')->name('relazioneFineIncorpormanetoperArea');
            });
            Route::get('inserisci-provvedimento-disciplinare', [AdminCorsiController::class, 'inserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdmin');
            Route::get('modifica-dati-allievi/{id?}', [AdminCorsiController::class, 'modificaDatiAllievi'])->middleware('auth')->name('modificaDatiAdmin');
            Route::post('modifica-dati-allievi/', [AdminCorsiController::class, 'aggiornaDatiAllievo'])->middleware('auth')->name('aggiornaDatiAllievoAdmin');

            Route::prefix('/sezione-disciplinare')->group(function () {
                Route::get('/', [AdminCorsiController::class, 'sezioneDisciplinare'])->middleware('auth')->name('disciplinareAdmin');
                Route::get('inserisci-provvedimento-disciplinare', [AdminCorsiController::class, 'paginaInserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdmin');
                Route::post('inserisci-provvedimento-disciplinare', [AdminCorsiController::class, 'inserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdmin');
                Route::get('modifica-provvedimento-disciplinare/{id?}', [AdminCorsiController::class, 'paginaModificaDisciplinare'])->middleware('auth')->name('modificaProvDAdmin');
                Route::post('modifica-provvedimento-disciplinare/', [AdminCorsiController::class, 'aggiornaProvvedimentoD'])->middleware('auth')->name('aggiornaProvDAdmin');
                Route::get('visualizza-provvedimento-disciplinare', [AdminCorsiController::class, 'paginaVisualizzaDisciplinare'])->middleware('auth')->name('visualizzaDisciplinareAdmin');
            });

            Route::prefix('/sezione-sanitaria')->group(function () {
                Route::get('/', [AdminCorsiController::class, 'sezioneSanitaria'])->middleware('auth')->name('sanitariaAdmin');
                Route::get('inserisci-provvedimento-sanitario', [AdminCorsiController::class, 'paginaInserisciSanitaria'])->middleware('auth')->name('inserisciSanitariaAdmin');
                Route::post('inserisci-provvedimento-sanitario', [AdminCorsiController::class, 'inserisciSanitaria'])->middleware('auth')->name('inserisciSanitariaAdmin');
                Route::get('modifica-provvedimento-sanitario/{id?}', [AdminCorsiController::class, 'paginaModificaSanitaria'])->middleware('auth')->name('modificaProvAdmin');
                Route::post('modifica-provvedimento-sanitario/', [AdminCorsiController::class, 'aggiornaProvvedimento'])->middleware('auth')->name('aggiornaProvAdmin');
                Route::get('visualizza-provvedimento-sanitario', [AdminCorsiController::class, 'paginaVisualizzaSanitaria'])->middleware('auth')->name('visualizzaSanitariaAdmin');

            });
            Route::prefix('/sezione-studi', [AdminCorsiController::class, 'sezioneStudi'])->group(function(){
                Route::get('/', [AdminCorsiController::class, 'sezioneStudi'])->middleware('auth')->name('sezioneStudi');
                Route::get('/inserisci-verbali-esami', [AdminCorsiController::class, 'paginaVerbaliEsami'])->middleware('auth')->name('sezioneStudi-insverbali');
                Route::post('/inserisci-verbali-esami', [AdminCorsiController::class, 'inserisciVerbaliEsami'])->middleware('auth')->name('sezioneStudi-insverbali');
            });
            Route::prefix('/sezione-sportiva', [AdminCorsiController::class, 'sezioneSportiva'])->group(function(){
                Route::get('/', [AdminCorsiController::class, 'sezioneSportiva'])->middleware('auth')->name('sezioneSportiva');
                Route::post('/inserisci-verbali-sportivi', [AdminCorsiController::class, 'inserisciVerbaliSportivi'])->middleware('auth')->name('sezioneSportiva-insverbali');
                Route::get('/inserisci-verbali-sportivi', [AdminCorsiController::class, 'paginaInserisciVerbalisportivi'])->middleware('auth')->name('paginaSezioneSportiva-insverbali');

            });






        });
        
        Route::prefix('/adminJ')->group(function () {
            Route::get('home', [AdminJuniorCorsiController::class, 'view'])->middleware('auth')->name('homeCorsiAdminJunior');
            Route::get('aggiungi-dati-corsi', [AdminJuniorCorsiController::class,'aggiungiDatiCorsi'])->middleware('auth')->name('aggiungidaticorsi');
            Route::post('aggiungi-dati-corsi', [AdminJuniorCorsiController::class, 'inserimentoDati'])->middleware('auth')->name('inserimentoDatiAdminJunior');
            Route::get('schede-individuali', [AdminJuniorCorsiController::class,'schedeIndividualiAllievi'])->middleware('auth')->name('schedeIndividuali');
            Route::post('schede-individuali', [AdminJuniorCorsiController::class,'ricercaSchedaIndividuale'])->middleware('auth')->name('schedeIndividuali');
            Route::get('scheda-allievo/{id}', [AdminJuniorCorsiController::class, 'downloadSchedaIndividuale'])->middleware('auth')->name('downloadScheda');
            Route::get('visualizza-scheda-allievo/{id}', [AdminJuniorCorsiController::class, 'visualizzaSchedaIndividuale'])->middleware('auth')->name('visualizzaSchedaAdminJ');
            Route::get('/', [AdminJuniorCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative');
            Route::prefix('/schede-riepilogative')->group(function () {
                Route::get('/', [AdminJuniorCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative');
                Route::get('/Relazione-fine-incorporamento',[RelazioneIncorporamentoController::class,'relazioneAnno'])->middleware('auth')->name('relazioneFineIncorpormaneto');
                //Route::get('/Relazione-fine-incorporamento-per-area',[relazioneIncorporamentoController::class,'relazioneArea'])->middleware('auth')->name('relazioneFineIncorpormanetoperArea');
            });
            Route::get('inserisci-provvedimento-disciplinare', [AdminJuniorCorsiController::class, 'inserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdminJunior');
            Route::get('modifica-dati-allievi/{id?}', [AdminJuniorCorsiController::class, 'modificaDatiAllievi'])->middleware('auth')->name('modificaDatiAdminJunior');
            Route::post('modifica-dati-allievi/', [AdminJuniorCorsiController::class, 'aggiornaDatiAllievo'])->middleware('auth')->name('aggiornaDatiAllievoAdminJunior');

            Route::prefix('/sezione-disciplinare')->group(function () {
                Route::get('/', [AdminJuniorCorsiController::class, 'sezioneDisciplinare'])->middleware('auth')->name('disciplinareAdmin');
                Route::get('inserisci-provvedimento-disciplinare', [AdminJuniorCorsiController::class, 'paginaInserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdminJunior');
                Route::post('inserisci-provvedimento-disciplinare', [AdminJuniorCorsiController::class, 'inserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdminJunior');
                Route::get('modifica-provvedimento-disciplinare/{id?}', [AdminJuniorCorsiController::class, 'paginaModificaDisciplinare'])->middleware('auth')->name('modificaProvDAdminJunior');
                Route::post('modifica-provvedimento-disciplinare/', [AdminJuniorCorsiController::class, 'aggiornaProvvedimentoD'])->middleware('auth')->name('aggiornaProvDAdminJunior');
                Route::get('visualizza-provvedimento-disciplinare', [AdminJuniorCorsiController::class, 'paginaVisualizzaDisciplinare'])->middleware('auth')->name('visualizzaDisciplinareAdminJunior');
            });

            Route::prefix('/sezione-sanitaria')->group(function () {
                Route::get('/', [AdminJuniorCorsiController::class, 'sezioneSanitaria'])->middleware('auth')->name('sanitariaAdmin');
                Route::get('inserisci-provvedimento-sanitario', [AdminJuniorCorsiController::class, 'paginaInserisciSanitaria'])->middleware('auth')->name('inserisciSanitariaAdminJunior');
                Route::post('inserisci-provvedimento-sanitario', [AdminJuniorCorsiController::class, 'inserisciSanitaria'])->middleware('auth')->name('inserisciSanitariaAdminJunior');
                Route::get('modifica-provvedimento-sanitario/{id?}', [AdminJuniorCorsiController::class, 'paginaModificaSanitaria'])->middleware('auth')->name('modificaProvAdminJunior');
                Route::post('modifica-provvedimento-sanitario/', [AdminJuniorCorsiController::class, 'aggiornaProvvedimento'])->middleware('auth')->name('aggiornaProvAdmin');
                Route::get('visualizza-provvedimento-sanitario', [AdminJuniorCorsiController::class, 'paginaVisualizzaSanitaria'])->middleware('auth')->name('visualizzaSanitariaAdminJunior');

            });
            Route::prefix('/sezione-studi', [AdminJuniorCorsiController::class, 'sezioneStudi'])->group(function(){
                Route::get('/', [AdminJuniorCorsiController::class, 'sezioneStudi'])->middleware('auth')->name('sezioneStudi');
                Route::get('/inserisci-verbali-esami', [AdminJuniorCorsiController::class, 'paginaVerbaliEsami'])->middleware('auth')->name('sezioneStudi-insverbali');
                Route::post('/inserisci-verbali-esami', [AdminJuniorCorsiController::class, 'inserisciVerbaliEsami'])->middleware('auth')->name('sezioneStudi-insverbali');
            });
            Route::prefix('/sezione-sportiva', [AdminJuniorCorsiController::class, 'sezioneSportiva'])->group(function(){
                Route::get('/', [AdminJuniorCorsiController::class, 'sezioneSportiva'])->middleware('auth')->name('sezioneSportiva');
                Route::post('/inserisci-verbali-sportivi', [AdminJuniorCorsiController::class, 'inserisciVerbaliSportivi'])->middleware('auth')->name('sezioneSportiva-insverbali');
                Route::get('/inserisci-verbali-sportivi', [AdminJuniorCorsiController::class, 'paginaInserisciVerbalisportivi'])->middleware('auth')->name('paginaSezioneSportiva-insverbali');

            });
        });
        Route::prefix('/addetto')->group(function () {
            Route::get('home', [AddettoCorsiController::class, 'view'])->middleware('auth')->name('homeCorsiAddetto');
            Route::get('schede-individuali', [AddettoCorsiController::class,'schedeIndividualiAllievi'])->middleware('auth')->name('schedeIndividualiAddetto');
            Route::post('schede-individuali', [AddettoCorsiController::class,'ricercaSchedaIndividuale'])->middleware('auth')->name('schedeIndividualiAddetto');
            Route::get('scheda-allievo/{id}', [AddettoCorsiController::class, 'downloadSchedaIndividuale'])->middleware('auth')->name('downloadScheda');
            Route::get('visualizza-scheda-allievo/{id}', [AddettoCorsiController::class, 'visualizzaSchedaIndividuale'])->middleware('auth')->name('visualizzaSchedaAddetto');
            Route::get('/', [AddettoCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative');
            Route::prefix('/schede-riepilogative')->group(function () {
                Route::get('/', [AddettoCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative');
                Route::get('/Relazione-fine-incorporamento',[RelazioneIncorporamentoController::class,'relazioneAnno'])->middleware('auth')->name('relazioneFineIncorpormaneto');
                //Route::get('/Relazione-fine-incorporamento-per-area',[relazioneIncorporamentoController::class,'relazioneArea'])->middleware('auth')->name('relazioneFineIncorpormanetoperArea');
            });

            Route::prefix('/sezione-disciplinare')->group(function () {
                Route::get('/', [AddettoCorsiController::class, 'sezioneDisciplinare'])->middleware('auth')->name('disciplinareAdmin');
                Route::get('visualizza-provvedimento-disciplinare', [AddettoCorsiController::class, 'paginaVisualizzaDisciplinare'])->middleware('auth')->name('visualizzaDisciplinareAddetto');
            });

            Route::prefix('/sezione-sanitaria')->group(function () {
                Route::get('/', [AddettoCorsiController::class, 'sezioneSanitaria'])->middleware('auth')->name('sanitariaAdmin');
                Route::get('visualizza-provvedimento-sanitario', [AddettoCorsiController::class, 'paginaVisualizzaSanitaria'])->middleware('auth')->name('visualizzaSanitariaAddetto');
    
            });
        });
    });
});







/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */






require __DIR__.'/auth.php';
