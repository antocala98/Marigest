<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\IncorporandiVfp1;

class AdminCorsiController extends Controller
{
    public function index(){
        return view('corsi.admin.home');
    }

    public function view()
    {
      // get current logged in user
      $user = Auth::user();

      $userAdmin= new User(['tipo_utente' => '1']);
       
      if ($user->can('view', $userAdmin)) {
        return view('corsi.admin.home');
      } else {
        abort(403, 'Azione non autorizzata.');
      }
    }

    public function gestionePersonale(){
        $user = Auth::user();

        $users=User::where('sezione_appartenenza','corsi')->get();

        $userAdmin= new User(['tipo_utente' => '1']);
        
        if ($user->can('view', $userAdmin)) {
            return view('corsi.admin.gestionepersonalecorsi',['users'=>$users]);
          } else {
            abort(403, 'Azione non autorizzata.');
          }
       
    }

    public function aggiungiDatiCorsi(){
        $user = Auth::user();

        $users=User::where('sezione_appartenenza','corsi')->get();

        $userAdmin= new User(['tipo_utente' => '1']);
        
        if ($user->can('view', $userAdmin)) {
            return view('corsi.admin.aggiungidaticorsi');
          } else {
            abort(403, 'Azione non autorizzata.');
          }
       
        
    }
    
    public function inserimentoDati(Request $request){
        IncorporandiNMRSController::import($request);
        return view('corsi.admin.aggiungidaticorsi')->with(['feedback_utente' => "File Excel inserito con successo nel database!"]);
        /*switch(Auth::user()->comando_appartenenza){
            case '':
                IncorporandiNMRSController::import($request);

        } */
    }
}
