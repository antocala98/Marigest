<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\IncorporandiVfp1;
use App\Models\Allievo;
use Barryvdh\DomPDF\Facade as PDF;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;



class AdminCorsiController extends Controller
{
  private $user;
  private $userAdmin;

  public function index()
  {
    return view('corsi.admin.home');
  }

  public function view()
  {

    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      return view('corsi.admin.home');
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }
  }

  public function gestionePersonale()
  {

    $users = User::where('sezione_appartenenza', 'corsi')->where('comando_appartenenza', $this->getUser()->comando_appartenenza)->where('id', '<>', $this->getUser()->id)->paginate(7);
    foreach ($users as $utente) {
      switch ($utente->tipo_utente) {
        case '0':
          $utente->tipo_utente = "Account in attesa di attivazione";
          break;
        case '1':
          $utente->tipo_utente = "Admin";
          break;
        case '2':
          $utente->tipo_utente = "Admin Junior";
          break;
        case '3':
          $utente->tipo_utente = "Addetto";
          break;
      }
    }


    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      return view('corsi.admin.gestionepersonalecorsi', ['users' => $users]);
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }

  }

  public function aggiungiDatiCorsi()
  {


    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      return view('corsi.admin.aggiungidaticorsi');
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }


  }

  public function inserimentoDati(Request $request)
  {
    IncorporandiNMRSController::import($request);
    return view('corsi.admin.aggiungidaticorsi')->with(['feedback_utente' => "File Excel inserito con successo nel database!"]);
  /*switch(Auth::user()->comando_appartenenza){
   case '':
   IncorporandiNMRSController::import($request);
   } */


  }
  public function modificaPermessi(Request $request)
  {
    if (($request->submit) == "gestionePermessi") {
      User::where('id', $request->id_personale_gestito_da_admin)->update(['tipo_utente' => $request->permessi]);
      $users = User::where('sezione_appartenenza', 'corsi')->where('comando_appartenenza', $this->getUser()->comando_appartenenza)->where('id', '<>', $this->user->id)->paginate(7);
      foreach ($users as $utente) {
        switch ($utente->tipo_utente) {
          case '0':
            $utente->tipo_utente = "Account in attesa di attivazione";
            break;
          case '1':
            $utente->tipo_utente = "Admin";
            break;
          case '2':
            $utente->tipo_utente = "Admin Junior";
            break;
          case '3':
            $utente->tipo_utente = "Addetto";
            break;
        }
      }
      return view('corsi.admin.gestionepersonalecorsi', ['users' => $users]);
    }
    else {
      User::where('id', $request->id_personale_gestito_da_admin)->delete();
      $users = User::where('sezione_appartenenza', 'corsi')->where('comando_appartenenza', $this->getUser()->comando_appartenenza)->where('id', '<>', $this->getUser()->id)->paginate(7);
      foreach ($users as $utente) {
        switch ($utente->tipo_utente) {
          case '0':
            $utente->tipo_utente = "Account in attesa di attivazione";
            break;
          case '1':
            $utente->tipo_utente = "Admin";
            break;
          case '2':
            $utente->tipo_utente = "Admin Junior";
            break;
          case '3':
            $utente->tipo_utente = "Addetto";
            break;
        }
      }
      return view('corsi.admin.gestionepersonalecorsi', ['users' => $users]);
    }
  }

  public function schedeIndividualiAllievi()
  {
    $allievi = Allievo::where('corso', $this->getUser()->comando_appartenenza)->get();

    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      return view('corsi.admin.schedeIndividuali', ['allievi' => $allievi]);
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }

  }

  public function ricercaSchedaIndividuale(Request $request)
  {
    $allievi = Allievo::where('corso', $this->getUser()->comando_appartenenza)->where('cognome', $request->cerca)
      ->orwhere('nome', $request->cerca)
      ->orwhere('sesso', $request->cerca)
      ->orwhere('categoria', $request->cerca)
      ->orwhere('matricola_militare', $request->cerca)
      ->get();

    return view('corsi.admin.schedeIndividuali', ['allievi' => $allievi]);

  }


  public function downloadSchedaIndividuale($id)
  {
    $allievo = Allievo::where('id', $id)->first();
    $allievo->data_nascita = Carbon::parse($allievo->data_nascita)->format('d/m/Y');
    $pdf = PDF::loadView('allegatoD', ['allievo' => $allievo]);
    return $pdf->download('Scheda Individuale-' . $allievo->cognome . $allievo->nome . '.pdf');
  }

  public function modificaDatiAllievi($id = null)
  {
    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      if ($id == null) {
        $allievi = Allievo::where('corso', Auth::user()->comando_appartenenza)->get();
        return view('corsi.admin.modificaDatiAllievo')->with(['allievi' => $allievi]);
      }
      else {
        $allievo = Allievo::where('id', $id)->first();
        return view('corsi.admin.modificaDatiAllievo')->with(['allievo' => $allievo]);
      }
    } else {
      abort(403, 'Azione non autorizzata.');
    }
  }

  public function schedeRiepilogative()
  {

    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      return view('corsi.admin.schederiepilogative');
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }
  }

  public function aggiornaDatiAllievo(Request $request)
  {
    $allievo = Allievo::find($request->id);

    if($request->foto != null){
      $request->foto = Storage::disk('local')->putFile('foto', $request->file('foto'));
      $allievo->foto=$request->foto;
    }

    $allievo->matricola_militare = $request->matricola_militare;
    $allievo->nome = $request->nome;
    $allievo->cognome = $request->cognome;
    $allievo->sesso = $request->sesso;
    $allievo->codice_fiscale = $request->codice_fiscale;
    $allievo->data_nascita = $request->data_nascita;
    $allievo->luogo_nascita = $request->luogo_nascita;
    $allievo->provincia_nascita = $request->provincia_nascita;
    $allievo->nazione_nascita = $request->nazione_nascita;
    $allievo->matricola_universita = $request->matricola_universita;
    $allievo->categoria = $request->categoria;
    $allievo->corso = $request->corso;
    $allievo->titolo_studio = $request->titolo_studio;
    $allievo->voto_diploma = $request->voto_diploma;
    $allievo->data_incorporamento = $request->data_incorporamento;
    $allievo->data_giuridica = $request->data_giuridica;
    $allievo->data_arrivo = $request->data_arrivo;
    $allievo->status_attuale = $request->status_attuale;
    $allievo->lavoro_precedente = $request->lavoro_precedente;
    $allievo->provincia_residenza = $request->provincia_residenza;
    $allievo->cap_residenza = $request->cap_residenza;
    $allievo->indirizzo_residenza = $request->indirizzo_residenza;
    $allievo->luogo_residenza = $request->luogo_residenza;
    $allievo->scalo_ferroviario = $request->scalo_ferroviario;
    $allievo->comando_carabinieri = $request->comando_carabinieri;
    $allievo->tribunale = $request->tribunale;
    $allievo->motivo_arruolamento = $request->motivo_arruolamento;
    $allievo->sport_praticato = $request->sport_praticato;
    $allievo->livello_sport_praticato = $request->livello_sport_praticato;
    $allievo->livello_lingue = $request->livello_lingue;
    $allievo->lingue = $request->lingue;
    $allievo->altro_titolo_studio = $request->altro_titolo_studio;
    $allievo->studio_2 = $request->studio_2;
    $allievo->scuola_militare = $request->scuola_militare;
    $allievo->freq_accademia = $request->freq_accademia;
    $allievo->ruolo_normale = $request->ruolo_normale;
    $allievo->provincia_domicilio = $request->provincia_domicilio;
    $allievo->cap_domicilio = $request->cap_domicilio;
    $allievo->indirizzo_domicilio = $request->indirizzo_domicilio;
    $allievo->luogo_domicilio = $request->luogo_domicilio;


    $allievo->save();

    return view('corsi.admin.modificaDatiAllievo', ['id' => $request->id ])->with(['feedback_utente' => "Hai modificato con successo i dati di ".$request->cognome." "."$request->nome"]);

  }

  public function sezioneDisciplinare(){
    return view('corsi.admin.sezioneDisciplinare');
  }
  public function paginaInserisciDisciplinare(){

    return view('corsi.admin.inserisciProvDisciplinare');
  }
  public function inserisciDisciplinare(Request $request){

  }
  public function paginaModificaDisciplinare(){
    return view('corsi.admin.modificaProvDisciplinare');
  }
  public function paginaVisualizzaDisciplinare(){
    return view('corsi.admin.visualizzaProvDisciplinare');
  }


  public function sezioneSanitaria(){
    return view('corsi.admin.sezioneSanitaria');
  }
    public function paginaInserisciSanitataria(){
    return view('corsi.admin.funzioniSanitarie.inserisciProvSanitario');
    }
    public function inserisciSanitaria(Request $request){

    }



  public function sezioneStudi(){
    return view('corsi.admin.sezioneStudi');
  }

  /**
   *
   * @return mixed
   */
  function getUser()
  {
    $this->user = Auth::user();
    return $this->user;
  }

  /**
   *
   * @return mixed
   */
  function getUserAdmin()
  {
    $this->userAdminJunior = new User(['tipo_utente' => '1']);
    return $this->userAdminJunior;
  }
}
