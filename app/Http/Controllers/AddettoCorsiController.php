<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\IncorporandiVfp1;
use App\Models\Materia;
use App\Models\RequisitoSportivo;
use App\Models\VerbaleSportivo;
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


class AddettoCorsiController extends Controller
{
  private $user;
  private $userAddetto;

  public function index()
  {
    return view('corsi.addetto.home');
  }

  public function view()
  {

    if ($this->getUser()->can('view', $this->getUserAddetto())) {
      return view('corsi.addetto.home');
    } else {
      abort(403, 'Azione non autorizzata.');
    }
  }




  public function schedeIndividualiAllievi()
  {
    $allievi = Allievo::where('corso', $this->getUser()->comando_appartenenza)->orderBy('cognome')->get();

    if ($this->getUser()->can('view', $this->getUserAddetto())) {
      return view('corsi.addetto.schedeIndividuali', ['allievi' => $allievi]);
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

    return view('corsi.addetto.schedeIndividuali', ['allievi' => $allievi]);

  }


  public function downloadSchedaIndividuale($id)
  {
    $allievo = Allievo::where('id', $id)->first();
    $pdf = $this->schedaIndividuale($id);
    return $pdf->download('Scheda Individuale-' . $allievo->cognome . $allievo->nome . '.pdf');
  }

  public function schedaIndividuale($id)
  {
    $allievo = Allievo::where('id', $id)->first();
    $provvedimentiSanitari = ProvvedimentoSanitario::get();
    $provvedimentiDisciplinari = ProvvedimentoDisciplinare::get();


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
    $verbaliSportiviPrimaClasse = 0;
    $sommaVotiSportiviPrimaClasse = 0;
    $verbaliSportiviSecondaClasse = 0;
    $sommaVotiSportiviSecondaClasse = 0;
    $verbaliSportiviTerzaClasse = 0;
    $sommaVotiSportiviTerzaClasse = 0;
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
      }
    }


    foreach ($provvedimentiDisciplinari as $provvedimento) {

      $matricola = $provvedimento->matricola_allievo;
      if ($allievo->matricola_militare == $matricola) {
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

        $verbaliSportiviPrimaClasse = VerbaleSportivo::where('matricola_allievo', $matricola)->where('classe_allievo', 'prima')
          ->select('disciplina')
          ->count('disciplina');
        $sommaVotiSportiviPrimaClasse = VerbaleSportivo::where('matricola_allievo', $matricola)->where('classe_allievo', 'prima')
          ->select('voto')
          ->sum('voto');
        $verbaliSportiviSecondaClasse = VerbaleSportivo::where('matricola_allievo', $matricola)->where('classe_allievo', 'seconda')
          ->select('disciplina')
          ->count('disciplina');
        $sommaVotiSportiviSecondaClasse = VerbaleSportivo::where('matricola_allievo', $matricola)->where('classe_allievo', 'seconda')
          ->select('voto')
          ->sum('voto');
        $verbaliSportiviTerzaClasse = VerbaleSportivo::where('matricola_allievo', $matricola)->where('classe_allievo', 'terza')
          ->select('disciplina')
          ->count('disciplina');
        $sommaVotiSportiviTerzaClasse = VerbaleSportivo::where('matricola_allievo', $matricola)->where('classe_allievo', 'terza')
          ->select('voto')
          ->sum('voto');
        break;
      }
    }
    if ($verbaliSportiviPrimaClasse > 0) {
      $mediaSportTerrestriPrimaClasse = ($sommaVotiSportiviPrimaClasse / $verbaliSportiviPrimaClasse);
    }
    else {
      $mediaSportTerrestriPrimaClasse = 0;
    }
    if ($verbaliSportiviSecondaClasse > 0) {
      $mediaSportTerrestriSecondaClasse = ($sommaVotiSportiviSecondaClasse / $verbaliSportiviSecondaClasse);
    }
    else {
      $mediaSportTerrestriSecondaClasse = 0;
    }
    if ($verbaliSportiviTerzaClasse > 0) {
      $mediaSportTerrestriTerzaClasse = ($sommaVotiSportiviTerzaClasse / $verbaliSportiviTerzaClasse);
    }
    else {
      $mediaSportTerrestriTerzaClasse = 0;
    }
    //da qua inizia il lavoro di giorgio


    $matricolaPerMaterie = $allievo->matricola_militare;

    $materie = Materia::select('nome', 'codice', 'sessione', 'classe', 'facolta')->get();
    $verbaliEsami = VerbaleEsame::where('matricola_allievo', $matricolaPerMaterie)->get();

    $materiePrimoAnno = Materia::where('classe', 'prima')->orderby('nome')->get();
    $materieSecondoAnno = Materia::where('classe', 'seconda')->orderby('nome')->get();
    $materieTerzoAnno = Materia::where('classe', 'terza')->orderby('nome')->get();
    $maxprimoanno = Materia::where('classe', 'prima')->orderby('nome')->count();
    $maxsecondoanno = Materia::where('classe', 'seconda')->orderby('nome')->count();
    $maxterzoanno = Materia::where('classe', 'terza')->orderby('nome')->count();


    //$verbaliJoinMateriePrimoAnno=VerbaleEsame::where('matricola_allievo',$matricolaPerMaterie)->leftJoin(Materia::select('nome','codice','sessione','classe','facolta'),'codice_materia', '=', 'codice')->get();
    $verbaliJoinMateriePrimoAnno = DB::table('verbali_esami')
      ->leftJoin('materie', 'codice', '=', 'codice_materia')
      ->where('classe', 'prima')->where('matricola_allievo', $matricolaPerMaterie)->where('voto', '!=', 'Assente')->where('voto', '>=', 18)
      ->get();

    $verbaliJoinMaterieSecondoAnno = DB::table('verbali_esami')
      ->leftJoin('materie', 'codice', '=', 'codice_materia')
      ->where('classe', 'seconda')->where('matricola_allievo', $matricolaPerMaterie)->where('voto', '!=', 'Assente')->where('voto', '>=', 18)
      ->get();

    $verbaliJoinMaterieTerzoAnno = DB::table('verbali_esami')
      ->leftJoin('materie', 'codice', '=', 'codice_materia')->where('classe', 'terza')->where('voto', '!=', 'Assente')->where('voto', '>=', 18)
      ->where('matricola_allievo', $matricolaPerMaterie)
      ->get();

    $esisteprimoanno = $verbaliJoinMateriePrimoAnno->count();
    $esistesecondoanno = $verbaliJoinMaterieSecondoAnno->count();
    $esisteterzoanno = $verbaliJoinMaterieTerzoAnno->count();

    if ($esisteprimoanno > $esistesecondoanno) {
      $max = $esisteprimoanno;
    }
    else {
      $max = $esistesecondoanno;
    }
    if ($max > $esisteterzoanno) {
    }
    else {
      $max = $esisteterzoanno;
    }
    if ($max > 0) {
      if ($esisteprimoanno > 0) {
        $mediaVotiPrimoAnno = $verbaliJoinMateriePrimoAnno->sum('voto') / $esisteprimoanno;
      }
      else {
        $mediaVotiPrimoAnno = null;
      }
      if ($esistesecondoanno > 0) {
        $mediaVotiSecondoAnno = $verbaliJoinMaterieSecondoAnno->sum('voto') / $esistesecondoanno;
      }
      else {
        $mediaVotiSecondoAnno = null;
      }
      if ($esisteterzoanno > 0) {
        $mediaVotiTerzoAnno = $verbaliJoinMaterieTerzoAnno->sum('voto') / $esisteterzoanno;
      }
      else {
        $mediaVotiTerzoAnno = null;
      }
    }
    else {
      $mediaVotiPrimoAnno = null;
      $mediaVotiSecondoAnno = null;
      $mediaVotiTerzoAnno = null;
    }
    $votiPrimoSemestrePrimoAnno = DB::table('verbali_esami')
      ->leftJoin('materie', 'codice', '=', 'codice_materia')
      ->where('classe', 'prima')->where('matricola_allievo', $matricolaPerMaterie)->where('voto', '!=', 'Assente')
      ->where('voto', '>=', 18)->where('sessione', 'primo semestre')
      ->get();

    $votiSecondoSemestrePrimoAnno = DB::table('verbali_esami')
      ->leftJoin('materie', 'codice', '=', 'codice_materia')
      ->where('classe', 'prima')->where('matricola_allievo', $matricolaPerMaterie)->where('voto', '!=', 'Assente')
      ->where('voto', '>=', 18)->where('sessione', 'secondo semestre')
      ->get();

    $votiPrimoSemestreSecondoAnno = DB::table('verbali_esami')
      ->leftJoin('materie', 'codice', '=', 'codice_materia')
      ->where('classe', 'seconda')->where('matricola_allievo', $matricolaPerMaterie)
      ->where('voto', '!=', 'Assente')->where('voto', '>=', 18)->where('sessione', 'primo semestre')
      ->get();

    $votiSecondoSemestreSecondoAnno = DB::table('verbali_esami')
      ->leftJoin('materie', 'codice', '=', 'codice_materia')
      ->where('classe', 'seconda')->where('matricola_allievo', $matricolaPerMaterie)
      ->where('voto', '!=', 'Assente')->where('voto', '>=', 18)->where('sessione', 'secondo semestre')
      ->get();

    $votiPrimoSemestreTerzoAnno = DB::table('verbali_esami')
      ->leftJoin('materie', 'codice', '=', 'codice_materia')
      ->where('classe', 'terza')->where('matricola_allievo', $matricolaPerMaterie)->where('voto', '!=', 'Assente')
      ->where('voto', '>=', 18)->where('sessione', 'primo semestre')
      ->get();

    $votiSecondoSemestreTerzoAnno = DB::table('verbali_esami')
      ->leftJoin('materie', 'codice', '=', 'codice_materia')
      ->where('classe', 'terza')->where('matricola_allievo', $matricolaPerMaterie)->where('voto', '!=', 'Assente')
      ->where('voto', '>=', 18)->where('sessione', 'secondo semestre')
      ->get();


    $totaleVotiPrimoSemestrePrimoAnno = $votiPrimoSemestrePrimoAnno->sum('voto');
    $numeroVotiPrimoSemestrePrimoAnno = $votiPrimoSemestrePrimoAnno->count();
    if ($numeroVotiPrimoSemestrePrimoAnno > 0) {
      $mediaVotiPrimoSemestrePrimoAnno = $totaleVotiPrimoSemestrePrimoAnno / $numeroVotiPrimoSemestrePrimoAnno;
    }
    else {
      $mediaVotiPrimoSemestrePrimoAnno = null;
    }

    $totaleVotiSecondoSemestrePrimoAnno = $votiSecondoSemestrePrimoAnno->sum('voto');
    $numeroVotiSecondoSemestrePrimoAnno = $votiSecondoSemestrePrimoAnno->count();
    if ($numeroVotiSecondoSemestrePrimoAnno > 0) {
      $mediaVotiSecondoSemestrePrimoAnno = $totaleVotiSecondoSemestrePrimoAnno / $numeroVotiSecondoSemestrePrimoAnno;
    }
    else {
      $mediaVotiSecondoSemestrePrimoAnno = null;
    }

    $totaleVotiPrimoSemestreSecondoAnno = $votiPrimoSemestreSecondoAnno->sum('voto');
    $numeroVotiPrimoSemestreSecondoAnno = $votiPrimoSemestreSecondoAnno->count();
    if ($numeroVotiPrimoSemestreSecondoAnno > 0) {
      $mediaVotiPrimoSemestreSecondoAnno = $totaleVotiPrimoSemestreSecondoAnno / $numeroVotiPrimoSemestreSecondoAnno;
    }
    else {
      $mediaVotiPrimoSemestreSecondoAnno = null;
    }

    $totaleVotiSecondoSemestreSecondoAnno = $votiSecondoSemestreSecondoAnno->sum('voto');
    $numeroVotiSecondoSemestreSecondoAnno = $votiSecondoSemestreSecondoAnno->count();
    if ($numeroVotiSecondoSemestreSecondoAnno > 0) {
      $mediaVotiSecondoSemestreSecondoAnno = $totaleVotiSecondoSemestreSecondoAnno / $numeroVotiSecondoSemestreSecondoAnno;
    }
    else {
      $mediaVotiSecondoSemestreSecondoAnno = null;
    }

    $totaleVotiPrimoSemestreTerzoAnno = $votiPrimoSemestreTerzoAnno->sum('voto');
    $numeroVotiPrimoSemestreTerzoAnno = $votiPrimoSemestreTerzoAnno->count();
    if ($numeroVotiPrimoSemestreTerzoAnno > 0) {
      $mediaVotiPrimoSemestreTerzoAnno = $totaleVotiPrimoSemestreTerzoAnno / $numeroVotiPrimoSemestreTerzoAnno;
    }
    else {
      $mediaVotiPrimoSemestreTerzoAnno = null;
    }

    $totaleVotiPrimoSemestreTerzoAnno = $votiPrimoSemestreTerzoAnno->sum('voto');
    $numeroVotiPrimoSemestreTerzoAnno = $votiPrimoSemestreTerzoAnno->count();
    if ($numeroVotiPrimoSemestreTerzoAnno > 0) {
      $mediaVotiPrimoSemestreTerzoAnno = $totaleVotiPrimoSemestreTerzoAnno / $numeroVotiPrimoSemestreTerzoAnno;
    }
    else {
      $mediaVotiPrimoSemestreTerzoAnno = null;
    }

    $totaleVotiSecondoSemestreTerzoAnno = $votiSecondoSemestreTerzoAnno->sum('voto');
    $numeroVotiSecondoSemestreTerzoAnno = $votiSecondoSemestreTerzoAnno->count();
    if ($numeroVotiSecondoSemestreTerzoAnno > 0) {
      $mediaVotiSecondoSemestreTerzoAnno = $totaleVotiSecondoSemestreTerzoAnno / $numeroVotiSecondoSemestreTerzoAnno;
    }
    else {
      $mediaVotiSecondoSemestreTerzoAnno = null;
    }


    $pdf = PDF::loadView('allegatoD', ['allievo' => $allievo, 'esenzaTotPrimaClasse' => $esenzaTotPrimaClasse, 'esenzaAGAPrimaClasse' => $esenzaAGAPrimaClasse,
      'ricoveroPrimaClasse' => $ricoveroPrimaClasse, 'degCovPrimaClasse' => $degCovPrimaClasse, 'matricola' => $matricola, 'conSempPrimaClasse' => $conSempPrimaClasse, 'rimproveroPrimaClasse' => $rimproveroPrimaClasse,
      'conRigPrimaClasse' => $conRigPrimaClasse, 'elogioPrimaClasse' => $elogioPrimaClasse, 'tpsPrimaClasse' => $tpsPrimaClasse, 'esenzaTotSecondaClasse' => $esenzaTotSecondaClasse, 'esenzaAGASecondaClasse' => $esenzaAGASecondaClasse,
      'ricoveroSecondaClasse' => $ricoveroSecondaClasse, 'degCovSecondaClasse' => $degCovSecondaClasse, 'conSempSecondaClasse' => $conSempSecondaClasse, 'rimproveroSecondaClasse' => $rimproveroSecondaClasse,
      'conRigSecondaClasse' => $conRigSecondaClasse, 'elogioSecondaClasse' => $elogioSecondaClasse, 'tpsSecondaClasse' => $tpsSecondaClasse, 'esenzaTotTerzaClasse' => $esenzaTotTerzaClasse, 'esenzaAGATerzaClasse' => $esenzaAGATerzaClasse,
      'ricoveroTerzaClasse' => $ricoveroTerzaClasse, 'degCovTerzaClasse' => $degCovTerzaClasse, 'conSempTerzaClasse' => $conSempTerzaClasse, 'rimproveroTerzaClasse' => $rimproveroTerzaClasse,
      'conRigTerzaClasse' => $conRigTerzaClasse, 'elogioTerzaClasse' => $elogioTerzaClasse, 'tpsTerzaClasse' => $tpsTerzaClasse,
      'materiePrimoAnno' => $materiePrimoAnno, 'materieSecondoAnno' => $materieSecondoAnno, 'materieTerzoAnno' => $materieTerzoAnno,
      'maxprimoanno' => $esisteprimoanno, 'maxterzoanno' => $esisteterzoanno, 'maxsecondoanno' => $esistesecondoanno, 'max' => $max, 'verbaliJoinMateriePrimoAnno' => $verbaliJoinMateriePrimoAnno, 'verbaliJoinMaterieSecondoAnno' => $verbaliJoinMaterieSecondoAnno, 'verbaliJoinMaterieTerzoAnno' => $verbaliJoinMaterieTerzoAnno,
      'mediaSportTerrestriPrimaClasse' => $mediaSportTerrestriPrimaClasse, 'mediaSportTerrestriTerzaClasse' => $mediaSportTerrestriTerzaClasse, 'esiste1' => $esisteprimoanno, 'esiste2' => $esistesecondoanno, 'esiste3' => $esisteterzoanno,
      'mediaSportTerrestriSecondaClasse' => $mediaSportTerrestriSecondaClasse, 'mediaVotiPrimoAnno' => $mediaVotiPrimoAnno, 'mediaVotiSecondoAnno' => $mediaVotiSecondoAnno, 'mediaVotiTerzoAnno' => $mediaVotiTerzoAnno,
      'mediaVotiPrimoSemestrePrimoAnno' => $mediaVotiPrimoSemestrePrimoAnno, 'mediaVotiSecondoSemestrePrimoAnno' => $mediaVotiSecondoSemestrePrimoAnno, 'mediaVotiPrimoSemestreSecondoAnno' => $mediaVotiPrimoSemestreSecondoAnno,
      'mediaVotiSecondoSemestreSecondoAnno' => $mediaVotiSecondoSemestreSecondoAnno, 'mediaVotiPrimoSemestreTerzoAnno' => $mediaVotiPrimoSemestreTerzoAnno, 'mediaVotiSecondoSemestreTerzoAnno' => $mediaVotiSecondoSemestreTerzoAnno,




    ]);
    return $pdf;
  }

  public function visualizzaSchedaIndividuale($id)
  {
    $allievo = Allievo::where('id', $id)->first();
    $pdf = $this->schedaIndividuale($id);

    return $pdf->stream('Scheda Individuale-' . $allievo->cognome . $allievo->nome . '.pdf');

  }
 

  public function schedeRiepilogative()
  {

    if ($this->getUser()->can('view', $this->getUserAddetto())) {
      return view('corsi.addetto.schederiepilogative');
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }
  }

  

  public function sezioneDisciplinare()
  {
    if ($this->getUser()->can('view', $this->getUserAddetto())) {
      return view('corsi.addetto.sezioneDisciplinare');
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }

  }

 
 
  
  public function paginaVisualizzaDisciplinare()
  {
    if ($this->getUser()->can('view', $this->getUserAddetto())) {
      $provvedimentoDisciplinare = ProvvedimentoDisciplinare::orderBy('data_provvedimento')->get();
      foreach ($provvedimentoDisciplinare as $provvedimentoD) {
        $provvedimentoD->data_provvedimento = Carbon::parse($provvedimentoD->data_provvedimento)->format('d/m/Y');
        $provvedimentoD->data_notifica = Carbon::parse($provvedimentoD->data_notifica)->format('d/m/Y');

      }
      return view('corsi.addetto.funzioniDisciplinare.visualizzaProvDisciplinare')->with(['provvedimentoDisciplinare' => $provvedimentoDisciplinare]);
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }


  }


  public function sezioneSanitaria()
  {
    if ($this->getUser()->can('view', $this->getUserAddetto())) {
      return view('corsi.addetto.sezioneSanitaria');
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }

  }


  public function paginaVisualizzaSanitaria()
  {
    if ($this->getUser()->can('view', $this->getUserAddetto())) {
      $provvedimentiSanitari = ProvvedimentoSanitario::orderBy('data_provvedimento')->get();
      foreach ($provvedimentiSanitari as $provvedimento) {
        $provvedimento->data_provvedimento = Carbon::parse($provvedimento->data_provvedimento)->format('d/m/Y');
      }
      return view('corsi.addetto.funzioniSanitarie.visualizzaProvSanitario')->with(['provvedimentiSanitari' => $provvedimentiSanitari]);
    }
    else {
      abort(403, 'Azione non autorizzata.');
    }


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
  function getUserAddetto()
  {
    $this->userAddetto = new User(['tipo_utente' => '3']);
    return $this->userAddetto;
  }
}
