<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Allievo;

class AdminJuniorCorsiController extends Controller
{
    public function create(){
        return view('corsi.admin_jr.aggiungidaticorsi');
    }
    public function ListaPersonale()
    {
        $users=User::where('sezione_appartenenza','corsi')->get();
        return view('corsi.admin_jr.home',['users'=>$users]);
    }

    public function view()
    {
      // get current logged in user
      $user = Auth::user();

      $userAdmin= new User(['tipo_utente' => '2']);
       
      if ($user->can('view', $userAdmin)) {
        return view('corsi.admin_jr.home');
      } else {
        abort(403, 'Azione non autorizzata.');
      }
    }

    public function gestionePersonale(){
      $user = Auth::user();

      $users=User::where('sezione_appartenenza','corsi')->where('comando_appartenenza',$user->comando_appartenenza)->where('id', '<>', $user->id)->paginate(7);
      foreach($users as $utente){
        switch($utente->tipo_utente){
            case '0': $utente->tipo_utente="Account in attesa di attivazione";
            break;
            case '1': $utente->tipo_utente="Admin";
            break;
            case '2': $utente->tipo_utente="Admin Junior";
            break;
            case '3': $utente->tipo_utente="Addetto";
            break;
        }
      }

      $userAdmin= new User(['tipo_utente' => '2']);
      
      if ($user->can('view', $userAdmin)) {
          return view('corsi.admin_jr.gestionepersonalecorsi',['users'=>$users]);
        } else {
          abort(403, 'Azione non autorizzata.');
        }
     
  }

    public function aggiungiDatiCorsi(){
        $user = Auth::user();

        $users=User::where('sezione_appartenenza','corsi')->get();

        $userAdminJunior= new User(['tipo_utente' => '2']);
        
        if ($user->can('view', $userAdminJunior)) {
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

    public function schedeIndividualiAllievi(){
      $user = Auth::user();

      $allievi=Allievo::where('corso', $user->comando_appartenenza)->get();

      $userAdminJunior= new User(['tipo_utente' => '2']);
      
      if ($user->can('view', $userAdminJunior)) {
          return view('corsi.admin_jr.schedeIndividuali',['allievi'=>$allievi]);
        } else {
          abort(403, 'Azione non autorizzata.');
        }
     
  }
}
