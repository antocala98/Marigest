<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\IncorporandiVfp1;
use App\Models\Materia;
use App\Models\Allievo;
use App\Models\VerbaleEsame;
use App\Models\ProvvedimentoDisciplinare;
use App\Models\ProvvedimentoSanitario;
use Barryvdh\DomPDF\Facade as PDF;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Corso;




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
    $allievi = Allievo::where('corso', $this->getUser()->comando_appartenenza)->orderBy('cognome')->get();

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
    $pdf=$this->schedaIndividuale($id);
    return $pdf->download('Scheda Individuale-' . $allievo->cognome . $allievo->nome . '.pdf');
  }

  public function schedaIndividuale($id){
    $allievo = Allievo::where('id', $id)->first();
    $provvedimentiSanitari = ProvvedimentoSanitario::get();
    $allievo->data_nascita = Carbon::parse($allievo->data_nascita)->format('d/m/Y');
    $esenzaTotPrimaClasse = 0;
    $esenzaTotSecondaClasse = 0;
    $esenzaTotTerzaClasse = 0;
    $esenzaAGAPrimaClasse = 0;
    $esenzaAGASecondaClasse = 0;
    $esenzaAGATerzaClasse = 0;
    $ricoveroPrimaClasse = 0;
    $ricoveroSecondaClasse = 0;
    $ricoveroTerzaClasse = 0;
    $degCovPrimaClasse = 0;
    $degCovSecondaClasse = 0;
    $degCovTerzaClasse = 0;
    $rimproveroPrimaClasse = 0;
    $rimproveroSecondaClasse = 0;
    $rimproveroTerzaClasse = 0;
    $conSempPrimaClasse = 0;
    $conSempSecondaClasse = 0;
    $conSempTerzaClasse = 0;
    $conRigPrimaClasse = 0;
    $conRigSecondaClasse = 0;
    $conRigTerzaClasse = 0;
    $elogioPrimaClasse = 0;
    $elogioSecondaClasse = 0;
    $elogioTerzaClasse = 0;
    $tpsPrimaClasse = 0;
    $tpsSecondaClasse = 0;
    $tpsTerzaClasse = 0;
    $matricola = 0;
    foreach ($provvedimentiSanitari as $provvedimento) {
      $matricola = ($provvedimento->matricola_allievo_paziente);
      if ($allievo->matricola_militare == $matricola) {
        $esenzaTotPrimaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Esenza Totale')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'prima')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $esenzaTotSecondaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Esenza Totale')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'seconda')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $esenzaTotTerzaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Esenza Totale')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'terza')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $esenzaAGAPrimaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Esenza AGA')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'prima')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $esenzaAGASecondaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Esenza AGA')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'seconda')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $esenzaAGATerzaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Esenza AGA')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'terza')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $ricoveroPrimaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Ricovero infermeria')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'prima')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $ricoveroSecondaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Ricovero infermeria')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'seconda')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $ricoveroTerzaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Ricovero infermeria')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'terza')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');

        $degCovPrimaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Degenza-Convalescenza')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'prima')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $degCovSecondaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Degenza-Convalescenza')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'seconda')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $degCovTerzaClasse = ProvvedimentoSanitario::where('tipo_provvedimento', 'Degenza-Convalescenza')
          ->where('matricola_allievo_paziente', $matricola)
          ->where('classe_allievo', 'terza')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');

        $rimproveroPrimaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Rimprovero')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'prima')
          ->select('tipo_provvedimento')
          ->count('tipo_provvedimento');
        $rimproveroSecondaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Rimprovero')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'seconda')
          ->select('tipo_provvedimento')
          ->count('tipo_provvedimento');
        $rimproveroTerzaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Rimprovero')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'terza')
          ->select('tipo_provvedimento')
          ->count('tipo_provvedimento');

        $conSempPrimaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Consegna Semplice')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'prima')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $conSempSecondaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Consegna Semplice')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'seconda')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $conSempTerzaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Consegna Semplice')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'terza')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');

        $conRigPrimaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Consegna Rigore')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'prima')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $conRigSecondaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Consegna Rigore')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'seconda')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');
        $conRigTerzaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Consegna Rigore')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'terza')
          ->select('num_giorni_provvedimento')
          ->sum('num_giorni_provvedimento');

        $elogioPrimaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Elogio')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'prima')
          ->select('tipo_provvedimento')
          ->count('tipo_provvedimento');
        $elogioSecondaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Elogio')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'seconda')
          ->select('tipo_provvedimento')
          ->count('tipo_provvedimento');
        $elogioTerzaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'Elogio')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'terza')
          ->select('tipo_provvedimento')
          ->count('tipo_provvedimento');

        $tpsPrimaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'TPS')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'prima')
          ->select('tipo_provvedimento')
          ->count('tipo_provvedimento');
        $tpsSecondaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'TPS')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'seconda')
          ->select('tipo_provvedimento')
          ->count('tipo_provvedimento');
        $tpsTerzaClasse = ProvvedimentoDisciplinare::where('tipo_provvedimento', 'TPS')
          ->where('matricola_allievo', $matricola)
          ->where('classe_allievo', 'terza')
          ->select('tipo_provvedimento')
          ->count('tipo_provvedimento');

        break;
      }
    }
    //da qua inizia il lavoro di giorgio






    $pdf = PDF::loadView('allegatoD', ['allievo' => $allievo, 'esenzaTotPrimaClasse' => $esenzaTotPrimaClasse, 'esenzaAGAPrimaClasse' => $esenzaAGAPrimaClasse,
      'ricoveroPrimaClasse' => $ricoveroPrimaClasse, 'degCovPrimaClasse' => $degCovPrimaClasse, 'matricola' => $matricola, 'conSempPrimaClasse' => $conSempPrimaClasse, 'rimproveroPrimaClasse' => $rimproveroPrimaClasse,
      'conRigPrimaClasse' => $conRigPrimaClasse, 'elogioPrimaClasse' => $elogioPrimaClasse, 'tpsPrimaClasse' => $tpsPrimaClasse, 'esenzaTotSecondaClasse' => $esenzaTotSecondaClasse, 'esenzaAGASecondaClasse' => $esenzaAGASecondaClasse,
      'ricoveroSecondaClasse' => $ricoveroSecondaClasse, 'degCovSecondaClasse' => $degCovSecondaClasse, 'conSempSecondaClasse' => $conSempSecondaClasse, 'rimproveroSecondaClasse' => $rimproveroSecondaClasse,
      'conRigSecondaClasse' => $conRigSecondaClasse, 'elogioSecondaClasse' => $elogioSecondaClasse, 'tpsSecondaClasse' => $tpsSecondaClasse, 'esenzaTotTerzaClasse' => $esenzaTotTerzaClasse, 'esenzaAGATerzaClasse' => $esenzaAGATerzaClasse,
      'ricoveroTerzaClasse' => $ricoveroTerzaClasse, 'degCovTerzaClasse' => $degCovTerzaClasse, 'conSempTerzaClasse' => $conSempTerzaClasse, 'rimproveroTerzaClasse' => $rimproveroTerzaClasse,
      'conRigTerzaClasse' => $conRigTerzaClasse, 'elogioTerzaClasse' => $elogioTerzaClasse, 'tpsTerzaClasse' => $tpsTerzaClasse]);
    return $pdf;
  }

  public function visualizzaSchedaIndividuale($id)
  {

    $allievo = Allievo::where('id', $id)->first();
    $pdf=$this->schedaIndividuale($id);

    return $pdf->stream('Scheda Individuale-' . $allievo->cognome . $allievo->nome . '.pdf');
    
  }


  public function modificaDatiAllievi($id = null)
  {
    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      if ($id == null) {
        $allievi = Allievo::where('corso', Auth::user()->comando_appartenenza)->orderBy('cognome')->get();
        return view('corsi.admin.modificaDatiAllievo')->with(['allievi' => $allievi]);
      }
      else {
        $allievo = Allievo::where('id', $id)->first();
        return view('corsi.admin.modificaDatiAllievo')->with(['allievo' => $allievo]);
      }
    }
    else {
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

    if ($request->foto != null) {
      $request->foto = Storage::disk('local')->putFile('foto', $request->file('foto'));
      $allievo->foto = $request->foto;
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

    return view('corsi.admin.modificaDatiAllievo', ['id' => $request->id])->with(['feedback_utente' => "Hai modificato con successo i dati di " . $request->cognome . " " . "$request->nome"]);

  }

  public function sezioneDisciplinare()
  {
    return view('corsi.admin.sezioneDisciplinare');
  }
  public function paginaInserisciDisciplinare()
  {
    $allievi = Allievo::where('corso', $this->getUser()->comando_appartenenza)->orderBy('cognome')->get();

    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      return view('corsi.admin.funzioniDisciplinare.inserisciProvDisciplinare')->with(['allievi' => $allievi]);
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }
  }
  public function inserisciDisciplinare(Request $request)
  {
    $request->validate([
      'n_protocollo' => ['required', 'string', 'max:255'],
      'data_provvedimento' => ['required'],
      'data_notifica' => ['required'],
    ]);


    $corso = Corso::where('numero_corso', explode('_', Auth::user()->comando_appartenenza))->first();

    if ($request->tipo_provvedimento == 'consegna semplice' || $request->tipo_provvedimento == 'consegna rigore') {
      $request->validate(['num_giorni' => ['required']]);
    }
    $provvedimentoDisciplinare = new ProvvedimentoDisciplinare();

    $provvedimentoDisciplinare->num_protocollo = $request->n_protocollo;
    $provvedimentoDisciplinare->tipo_provvedimento = $request->tipo_provvedimento;
    $provvedimentoDisciplinare->num_giorni_provvedimento = $request->num_giorni;
    $provvedimentoDisciplinare->data_provvedimento = $request->data_provvedimento;
    $provvedimentoDisciplinare->data_notifica = $request->data_notifica;
    $provvedimentoDisciplinare->matricola_allievo = $request->allievo;
    $provvedimentoDisciplinare->classe_allievo = $corso->classe;
    $provvedimentoDisciplinare->id_user_committente = Auth::user()->id;


    $provvedimentoDisciplinare->save();

    return view('corsi.admin.funzioniDisciplinare.inserisciProvDisciplinare', ['id' => $request->id])->with(['feedback_utente' => "Hai inserito con successo il provvedimento disciplinare"]);
  }

  public function paginaModificaDisciplinare($id = null)
  {
    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      if ($id == null) {
        $provvedimentoDisciplinare = ProvvedimentoDisciplinare::orderBy('data_provvedimento')->get();
        return view('corsi.admin.funzioniDisciplinare.modificaProvDisciplinare')
          ->with(['provvedimentoDisciplinare' => $provvedimentoDisciplinare]);
      }
      else {
        $provvedimentoD = ProvvedimentoDisciplinare::where('id', $id)->first();
        return view('corsi.admin.funzioniDisciplinare.modificaProvDisciplinare')->with(['provvedimentoD' => $provvedimentoD]);
      }
    }
  }
  public function aggiornaProvvedimentoD(Request $request)
  {
    $provvedimentoDisciplinare = ProvvedimentoDisciplinare::find($request->id);

    $provvedimentoDisciplinare->tipo_provvedimento = $request->tipo_provvedimento;
    $provvedimentoDisciplinare->num_giorni_provvedimento = $request->num_giorni;
    $provvedimentoDisciplinare->data_provvedimento = $request->data_provvedimento;
    $provvedimentoDisciplinare->num_protocollo = $request->n_protocollo;

    $provvedimentoDisciplinare->save();

    return view('corsi.admin.funzioniDisciplinare.modificaProvDisciplinare', ['id' => $request->id])->with(['feedback_utente' => "Hai modificato con successo i dati di " . $request->matricola_allievo]);

  }
  public function paginaVisualizzaDisciplinare()
  {
    $provvedimentoDisciplinare = ProvvedimentoDisciplinare::orderBy('data_provvedimento')->get();
    foreach ($provvedimentoDisciplinare as $provvedimentoD) {
      $provvedimentoD->data_provvedimento = Carbon::parse($provvedimentoD->data_provvedimento)->format('d/m/Y');
      $provvedimentoD->data_notifica = Carbon::parse($provvedimentoD->data_notifica)->format('d/m/Y');

    }
    return view('corsi.admin.funzioniDisciplinare.visualizzaProvDisciplinare')->with(['provvedimentoDisciplinare' => $provvedimentoDisciplinare]);

  }


  public function sezioneSanitaria()
  {
    return view('corsi.admin.sezioneSanitaria');
  }
  public function paginaInserisciSanitataria()
  {
    $allievi = Allievo::where('corso', $this->getUser()->comando_appartenenza)->orderBy('cognome')->get();

    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      return view('corsi.admin.funzioniSanitarie.inserisciProvSanitario')->with(['allievi' => $allievi]);
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }
  }
  public function inserisciSanitaria(Request $request)
  {
    $request->validate([
      'data_provvedimento' => ['required'],
    ]);

    $corso = Corso::where('numero_corso', explode('_', Auth::user()->comando_appartenenza))->first();

    $provvedimentoSanitario = new ProvvedimentoSanitario();

    $provvedimentoSanitario->tipo_provvedimento = $request->tipo_provvedimento;
    $provvedimentoSanitario->num_giorni_provvedimento = $request->num_giorni;
    $provvedimentoSanitario->data_provvedimento = $request->data_provvedimento;
    $provvedimentoSanitario->matricola_allievo_paziente = $request->allievo;
    $provvedimentoSanitario->classe_allievo = $corso->classe;
    $provvedimentoSanitario->id_user_infermeria = Auth::user()->id;

    $provvedimentoSanitario->save();
    return view('corsi.admin.funzioniSanitarie.inserisciProvSanitario', ['id' => $request->id])->with(['feedback_utente' => "Hai inserito con successo il provvedimento disciplinare"]);
  }
  public function paginaModificaSanitaria($id = null)
  {
    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      if ($id == null) {
        $provvedimentiSanitari = ProvvedimentoSanitario::orderBy('data_provvedimento')->get();
        return view('corsi.admin.funzioniSanitarie.modificaProvSanitario')
          ->with(['provvedimentiSanitari' => $provvedimentiSanitari]);
      }
      else {
        $provvedimento = ProvvedimentoSanitario::where('id', $id)->first();
        return view('corsi.admin.funzioniSanitarie.modificaProvSanitario')->with(['provvedimento' => $provvedimento]);
      }
    }
  }
  public function aggiornaProvvedimento(Request $request)
  {
    $provvedimentoSanitario = ProvvedimentoSanitario::find($request->id);

    $provvedimentoSanitario->tipo_provvedimento = $request->tipo_provvedimento;
    $provvedimentoSanitario->num_giorni_provvedimento = $request->num_giorni;
    $provvedimentoSanitario->data_provvedimento = $request->data_provvedimento;
    $provvedimentoSanitario->save();

    return view('corsi.admin.funzioniSanitarie.modificaProvSanitario', ['id' => $request->id])->with(['feedback_utente' => "Hai modificato con successo i dati di " . $request->matricola_allievo_paziente]);


  }

  public function paginaVisualizzaSanitaria()
  {
    $provvedimentiSanitari = ProvvedimentoSanitario::orderBy('data_provvedimento')->get();
    foreach ($provvedimentiSanitari as $provvedimento) {
      $provvedimento->data_provvedimento = Carbon::parse($provvedimento->data_provvedimento)->format('d/m/Y');
    }
    return view('corsi.admin.funzioniSanitarie.visualizzaProvSanitario')->with(['provvedimentiSanitari' => $provvedimentiSanitari]);
  }



  public function sezioneStudi()
  {
    $userRedattore=Auth::user();
    $materie = Materia::where('id','>',0)->get();
    $allievi = Allievo::where('corso', Auth::user()->comando_appartenenza)->orderBy('cognome')->get();
    if ($this->getUser()->can('view', $this->getUserAdmin())) {
      return view('corsi.admin.sezioneStudi.aggiungiVerbaleEsame')->with(['allievi' => $allievi])->with(['materie'=>$materie])->with(['userRedattore'=>$userRedattore]);
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }
  }
public function inserisciVerbaliEsami(Request $request)
  {
    $materie = Materia::where('id','>',0)->get();
    $allievi = Allievo::where('corso', Auth::user()->comando_appartenenza)->orderBy('cognome')->get();
    $userRedattore=Auth::user();
    $verbaleEsame = new VerbaleEsame();

    $verbaleEsame->codice_verbale=$request->codiceVerbale;
    $verbaleEsame->codice_materia=$request->materie;
    $verbaleEsame->data_verbale=$request->dataVerbale;
    $verbaleEsame->voto=$request->voto;
    $verbaleEsame->ufficiale_commissione=$request->ufficiale;
    $verbaleEsame->matricola_allievo=$request->allievo;
    $verbaleEsame->id_user_redattore=$request->idUserRedattore;
    $verbaleEsame->save();

    return view('corsi.admin.sezioneStudi.aggiungiVerbaleEsame',['userRedattore' => $userRedattore,'materie'=> $materie,'allievi'=>$allievi])->with(['feedback_utente' => "Hai inserito con successo il varbale con protocollo" . $request->codice_verbale]);
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
