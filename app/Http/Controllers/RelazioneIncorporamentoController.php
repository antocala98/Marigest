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
        //$areaNord = collect(['nomeNord'=>$nomeNord, 'totaleNord'=>$totaleNord,'percentualeNord'=> $percentualeNord]);
        //$nord=$areaNord->get('totaleNord');
        
        $totaleCentro=0;
        $percentualeCentro=0;
        $nomeCentro='Centro';
        $areaCentro = collect(['nomeCentro'=>$nomeCentro, 'totaleCentro'=>$totaleCentro,'percentualeCentro'=> $percentualeCentro]);

        $totaleSud=0;
        $percentualeSud=0;
        $nomeSud='Sud';
        $areaSud = collect(['nomeSud'=>$nomeSud,'totaleSud'=> $totaleSud,'percentualeSud'=> $percentualeSud]);

        $totaleNord= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->where('provincia_residenza','CT')
        ->orwhere('provincia_residenza','BR')
        ->count();        
        $percentualeNord=$totaleNord/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
        $areaNord = collect(['nomeNord'=>$nomeNord, 'totaleNord'=>$totaleNord,'percentualeNord'=> $percentualeNord]);
        $area=collect(['nord'=>$areaNord,'centro'=> $areaCentro,'sud'=> $areaSud]);
        return view('corsi.admin.resoconti.relazioneFineIncorporamento',['Anni'=>$allievi,'area'=>$area]);
      }
    
}
