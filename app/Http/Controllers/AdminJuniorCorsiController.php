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
  public function schedeRiepilogative(){
      
      if ($this->getUser()->can('view', $this->getUserAdminJunior())) {
          return view('corsi.admin_jr.schederiepilogative');
        } else {
          abort(403, 'Azione non autorizzata.');
        }
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
