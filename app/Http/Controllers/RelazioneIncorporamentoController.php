<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 
use App\Models\Allievo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\MergeValue;
use Illuminate\Support\Facades\Auth;
class relazioneIncorporamentoController extends Controller
{
    public function relazioneAnno(){
      
      
      $allievi = Allievo::where('corso', Auth::user()->comando_appartenenza)->select('id','data_nascita','voto_diploma as totale','voto_diploma as percentuale')->orderBy('data_nascita','asc')->get();
      $totale=$allievi->count();
      
      
      /**foreach($allievi as $allievo){
        $data=new Carbon($allievo->data_nascita);
        $allievo->data_nascita=$data->year;
        $allievo->totale=$allievi->where('data_nascita','=',$allievo->data_nascita)->count('data_nascita');
        $allievo->percentuale=($allievo->totale/$totale)*100;
        $count=0;
        //$allievi->data_nascita=$data->year;
        
        }*/
        foreach($allievi as $allievo){
          $data=new Carbon($allievo->data_nascita);
          $allievo->data_nascita=$data->year;
          $allievo->totale= Allievo::where('corso', Auth::user()->comando_appartenenza)->whereYear('data_nascita', $allievo->data_nascita)->select('id','data_nascita','voto_diploma as totale')->orderBy('data_nascita','asc')->count('data_nascita');
          $allievo->percentuale=($allievo->totale/Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
        }
        $allievi=$allievi->unique('data_nascita');
        
        
      
      $prova='ciao mondo';
        return view('corsi.admin.relazioneFineIncorporamento',['Anni'=>$allievi]);
      }
}
