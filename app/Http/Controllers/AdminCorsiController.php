<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\IncorporandiVfp1;
use App\Models\Allievo;
use Barryvdh\DomPDF\Facade as PDF;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use Carbon\Carbon;


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
    public function modificaPermessi(Request $request){
        $user = Auth::user();
        if(($request->submit)=="gestionePermessi"){
            User::where('id', $request->id_personale_gestito_da_admin)->update(['tipo_utente' => $request->permessi]);
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
            return view('corsi.admin.gestionepersonalecorsi',['users'=>$users]);
        }else{
          User::where('id', $request->id_personale_gestito_da_admin)->delete();
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
            return view('corsi.admin.gestionepersonalecorsi',['users'=>$users]);
        }
    }

    public function schedeIndividualiAllievi(){
      $user = Auth::user();

      $allievi=Allievo::where('corso', $user->comando_appartenenza)->get();

      $userAdminJunior= new User(['tipo_utente' => '1']);

      if ($user->can('view', $userAdminJunior)) {
          return view('corsi.admin.schedeIndividuali',['allievi'=>$allievi]);
        } else {
          abort(403, 'Azione non autorizzata.');
        }

    }

    public function ricercaSchedaIndividuale(Request $request){
        $user = Auth::user();
        $allievi=Allievo::where('corso', $user->comando_appartenenza)->where('cognome', $request->cerca)
            ->orwhere('nome',$request->cerca)
            ->orwhere('sesso',$request->cerca)
            ->orwhere('categoria',$request->cerca)
            ->orwhere('matricola_militare',$request->cerca)
            ->get();

        return view ('corsi.admin.schedeIndividuali',['allievi'=>$allievi]);


    }


    public function downloadSchedaIndividuale($id){
      $allievo=Allievo::where('id',$id)->first();
      $allievo->data_nascita=Carbon::parse($allievo->data_nascita)->format('d/m/Y');
      $pdf = PDF::loadView('allegatoD', ['allievo' => $allievo]);
      return $pdf->download('Scheda Individuale-'.$allievo->cognome.$allievo->nome.'.pdf');
    }

    public function modificaDatiAllievi($id = null){
      if($id == null){
        $allievi=Allievo::where('corso', Auth::user()->comando_appartenenza)->get();
        return view('corsi.admin.modificaDatiAllievo')->with(['allievi' => $allievi]);
      } else {
        $allievo=Allievo::where('id', $id)->first();
        return view('corsi.admin.modificaDatiAllievo')->with(['allievo' => $allievo]);
      }
    }
}
