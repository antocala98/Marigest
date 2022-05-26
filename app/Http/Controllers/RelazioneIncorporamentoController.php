<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 
use App\Models\Allievo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\MergeValue;
use Illuminate\Support\Facades\Auth;
class relazioneIncorporamentoController extends Controller
{
    public function relazioneAnno(){
      
      $current = Carbon::now()->year;
      $allievi = Allievo::where('corso', Auth::user()->comando_appartenenza)->select('id','data_nascita','voto_diploma as totale','voto_diploma as percentuale')->orderBy('data_nascita','asc')->get();
        foreach($allievi as $allievo){
          $data=new Carbon($allievo->data_nascita);
          $allievo->data_nascita=$data->year;
          $allievo->totale= Allievo::where('corso', Auth::user()->comando_appartenenza)->whereYear('data_nascita', $allievo->data_nascita)->select('id','data_nascita','voto_diploma as totale','data_giuridica as eta')->orderBy('data_nascita','asc')->count('data_nascita');
          $allievo->percentuale=($allievo->totale/Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $allievo->eta=$current-$allievo->data_nascita;
        }
        $allievi=$allievi->unique('data_nascita');
        

        $totaleNord=100;
        $percentualeNord=0;
        $nomeNord='Nord';
        
        $totaleCentro=0;
        $percentualeCentro=0;
        $nomeCentro='Centro';
        
        $totaleSud=0;
        $percentualeSud=0;
        $nomeSud='Sud';
        

        $totaleNord= Allievo::where('corso', Auth::user()->comando_appartenenza)
        //Emilia Romagna
        ->where('provincia_residenza','BO')
        ->orwhere('provincia_residenza','FC')
        ->orwhere('provincia_residenza','FE')
        ->orwhere('provincia_residenza','MO')
        ->orwhere('provincia_residenza','PC')
        ->orwhere('provincia_residenza','PR')
        ->orwhere('provincia_residenza','RA')
        ->orwhere('provincia_residenza','RE')
        ->orwhere('provincia_residenza','RN')
        //friuli veneia Giulia
        ->orwhere('provincia_residenza','GO')
        ->orwhere('provincia_residenza','PN')
        ->orwhere('provincia_residenza','TS')
        ->orwhere('provincia_residenza','UD')
        //Liguria
        ->orwhere('provincia_residenza','GE')
        ->orwhere('provincia_residenza','IM')
        ->orwhere('provincia_residenza','SP')
        ->orwhere('provincia_residenza','SV')
        //Lombardia
        ->orwhere('provincia_residenza','BG')
        ->orwhere('provincia_residenza','BS')
        ->orwhere('provincia_residenza','CO')
        ->orwhere('provincia_residenza','CR')
        ->orwhere('provincia_residenza','LC')
        ->orwhere('provincia_residenza','LO')
        ->orwhere('provincia_residenza','MB')
        ->orwhere('provincia_residenza','MI')
        ->orwhere('provincia_residenza','MN')
        ->orwhere('provincia_residenza','PV')
        ->orwhere('provincia_residenza','SO')
        ->orwhere('provincia_residenza','VA')
        //Piemonte
        ->orwhere('provincia_residenza','AL')
        ->orwhere('provincia_residenza','AT')
        ->orwhere('provincia_residenza','BI')
        ->orwhere('provincia_residenza','CN')
        ->orwhere('provincia_residenza','NO')
        ->orwhere('provincia_residenza','TO')
        ->orwhere('provincia_residenza','VB')
        ->orwhere('provincia_residenza','VC')
        //TRENTINO
        ->orwhere('provincia_residenza','BZ')
        ->orwhere('provincia_residenza','TN')
        //VALLE D'AOSTA
        ->orwhere('provincia_residenza','AO')
        //VENETO
        ->orwhere('provincia_residenza','BL')
        ->orwhere('provincia_residenza','PD')
        ->orwhere('provincia_residenza','RO')
        ->orwhere('provincia_residenza','TV')
        ->orwhere('provincia_residenza','VE')
        ->orwhere('provincia_residenza','VI')
        ->orwhere('provincia_residenza','VR')

        ->count();

        $totaleCentro= Allievo::where('corso', Auth::user()->comando_appartenenza)
        //Abruzzo
        ->where('provincia_residenza','AQ')
        ->orwhere('provincia_residenza','CH')
        ->orwhere('provincia_residenza','PE')
        ->orwhere('provincia_residenza','TE')
        //Lazio
        ->orwhere('provincia_residenza','FR')
        ->orwhere('provincia_residenza','LT')
        ->orwhere('provincia_residenza','RI')
        ->orwhere('provincia_residenza','RO')
        ->orwhere('provincia_residenza','Roma')
        ->orwhere('provincia_residenza','VT')
        //Marche
        ->orwhere('provincia_residenza','AN')
        ->orwhere('provincia_residenza','AP')
        ->orwhere('provincia_residenza','FM')
        ->orwhere('provincia_residenza','MC')
        ->orwhere('provincia_residenza','PU')
        //TOSCANA
        ->orwhere('provincia_residenza','AR')
        ->orwhere('provincia_residenza','FI')
        ->orwhere('provincia_residenza','GR')
        ->orwhere('provincia_residenza','LI')
        ->orwhere('provincia_residenza','LU')
        ->orwhere('provincia_residenza','MS')
        ->orwhere('provincia_residenza','PI')
        ->orwhere('provincia_residenza','PO')
        ->orwhere('provincia_residenza','PT')
        ->orwhere('provincia_residenza','SI')
        //UMBRIA
        ->orwhere('provincia_residenza','PG')
        ->orwhere('provincia_residenza','TR')
        ->count();

        $totaleSud= Allievo::where('corso', Auth::user()->comando_appartenenza)
        //Basilicata
        ->where('provincia_residenza','MT')
        ->orwhere('provincia_residenza','PZ')
        //Calabria
        ->orwhere('provincia_residenza','CS')
        ->orwhere('provincia_residenza','CZ')
        ->orwhere('provincia_residenza','KR')
        ->orwhere('provincia_residenza','RC')
        ->orwhere('provincia_residenza','VV')
        //Campania
        ->orwhere('provincia_residenza','AV')
        ->orwhere('provincia_residenza','BN')
        ->orwhere('provincia_residenza','CE')
        ->orwhere('provincia_residenza','NA')
        ->orwhere('provincia_residenza','SA')
        //Molise
        ->orwhere('provincia_residenza','CB')
        ->orwhere('provincia_residenza','IS')
        //pUGLIA
        ->orwhere('provincia_residenza','BR')
        ->orwhere('provincia_residenza','BA')
        ->orwhere('provincia_residenza','BT')
        ->orwhere('provincia_residenza','FG')
        ->orwhere('provincia_residenza','LE')
        ->orwhere('provincia_residenza','TA')
        //SARDEGNA
        ->orwhere('provincia_residenza','CA')
        ->orwhere('provincia_residenza','CI')
        ->orwhere('provincia_residenza','NU')
        ->orwhere('provincia_residenza','OG')
        ->orwhere('provincia_residenza','OR')
        ->orwhere('provincia_residenza','OT')
        ->orwhere('provincia_residenza','SS')
        ->orwhere('provincia_residenza','vs')
        //SICILIA
        ->orwhere('provincia_residenza','AG')
        ->orwhere('provincia_residenza','CL')
        ->orwhere('provincia_residenza','CT')
        ->orwhere('provincia_residenza','EN')
        ->orwhere('provincia_residenza','ME')
        ->orwhere('provincia_residenza','PA')
        ->orwhere('provincia_residenza','RG')
        ->orwhere('provincia_residenza','SR')
        ->orwhere('provincia_residenza','TP')
        
        ->count();

        $percentualeNord=$totaleNord/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
        $percentualeCentro=$totaleCentro/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
        $percentualeSud=$totaleSud/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;

        $areaNord = collect(['nomeNord'=>$nomeNord, 'totaleNord'=>$totaleNord,'percentualeNord'=> $percentualeNord]);
        $areaCentro = collect(['nomeCentro'=>$nomeCentro, 'totaleCentro'=>$totaleCentro,'percentualeCentro'=> $percentualeCentro]);
        $areaSud = collect(['nomeSud'=>$nomeSud,'totaleSud'=> $totaleSud,'percentualeSud'=> $percentualeSud]);
        $area=collect(['nord'=>$areaNord,'centro'=> $areaCentro,'sud'=> $areaSud]);





        return view('corsi.admin.resoconti.relazioneFineIncorporamento',['Anni'=>$allievi,'area'=>$area]);
      }
}
