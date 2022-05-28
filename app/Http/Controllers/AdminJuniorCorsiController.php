<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Allievo;

class AdminJuniorCorsiController extends Controller
{
    private $user;
    private $userAdminJunior;


    public function create(){
        return view('corsi.admin_jr.aggiungidaticorsi');
    }
    public function view()
    {
      // get current logged in user
       
      if ($this->getUser()->can('view', $this->getUserAdminJunior())) {
        return view('corsi.admin_jr.home');
      } else {
        abort(403, 'Azione non autorizzata.');
      }
    }


    public function aggiungiDatiCorsi(){
        

        if ($this->getUser()->can('view', $this->getUserAdminJunior())) {
            return view('corsi.admin_jr.aggiungidaticorsi');
          } else {
            abort(403, 'Azione non autorizzata.');
          }
       
        
    }
    
    public function inserimentoDati(Request $request){
        IncorporandiNMRSController::import($request);
        return view('corsi.admin_jr.aggiungidaticorsi')->with(['feedback_utente' => "File Excel inserito con successo nel database!"]);
        /*switch(Auth::user()->comando_appartenenza){
            case '':
                IncorporandiNMRSController::import($request);

        } */
    }

    public function ricercaSchedaIndividuale(Request $request){
    $allievi = Allievo::where('corso', $this->getUser()->comando_appartenenza)->where('cognome', $request->cerca)
      ->orwhere('nome', $request->cerca)
      ->orwhere('sesso', $request->cerca)
      ->orwhere('categoria', $request->cerca)
      ->orwhere('matricola_militare', $request->cerca)
      ->get();

    return view('corsi.admin_jr.schedeIndividuali', ['allievi' => $allievi]);


    }

    public function schedeIndividualiAllievi(){

      $allievi=Allievo::where('corso', $this->getUser()->comando_appartenenza)->get();

      
      if ($this->getUser()->can('view', $this->getUserAdminJunior())) {
          return view('corsi.admin_jr.schedeIndividuali',['allievi'=>$allievi]);
        } else {
          abort(403, 'Azione non autorizzata.');
        }
     
  }

  public function modificaDatiAllievi($id = null)
  {
    if ($this->getUser()->can('view', $this->getUserAdminJunior())) {
      if ($id == null) {
        $allievi = Allievo::where('corso', Auth::user()->comando_appartenenza)->get();
        return view('corsi.admin_jr.modificaDatiAllievo')->with(['allievi' => $allievi]);
      } else {
        $allievo = Allievo::where('id', $id)->first();
        return view('corsi.admin_jr.modificaDatiAllievo')->with(['allievo' => $allievo]);
      }
    } else {
      abort(403, 'Azione non autorizzata.');
    }
  }

  public function schedeRiepilogative(){
      
      if ($this->getUser()->can('view', $this->getUserAdminJunior())) {
          return view('corsi.admin_jr.schederiepilogative');
        } else {
          abort(403, 'Azione non autorizzata.');
        }
    }

    public function aggiornaDatiAllievo(Request $request)
  {
    $allievo = Allievo::find($request->id);


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
    $allievo->foto= $request->foto;
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

    return view('corsi.admin_jr.modificaDatiAllievo', ['id' => $request->id ])->with(['feedback_utente' => "Hai modificato con successo i dati di ".$request->cognome." "."$request->nome"]);

  }
	/**
	 * 
	 * @return mixed
	 */
	function getUser() {
    $this->user =Auth::user();
		return $this->user;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getUserAdminJunior() {
    $this->userAdminJunior=new User(['tipo_utente' => '2']);
		return $this->userAdminJunior;
	}
}
