<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 
use App\Models\Allievo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\MergeValue;
use Illuminate\Support\Facades\Auth;
class relazioneIncorporamentoController extends Controller
{
    public function relazioneAnno(){
      $totale=DB::table('allievi')->count();
      $annoMinimo=DB::table('allievi')->min('data_nascita');
      $annoMassimo=DB::table('allievi')->max('data_nascita');
      $annoMassimoCarbon= new Carbon($annoMassimo);
      
      $anno0= new Carbon($annoMinimo);
      $j=0;
      $array=array($j=>$anno0);
      $i = $anno0->year;
      for($i = $anno0->year; $i < $annoMassimoCarbon->year; $i++) {
        $anno1= new Carbon($annoMinimo);
        $j++;
        $anno1->addyear($j);
        $myarray= array_merge($array,array($j=>$anno1));
        $array=array_merge($myarray,array('$j'=>$anno0));
      }
      $allievi=DB::table('allievi')->get();
      $j=0;
      $count=0;
      $countMyArray=array($j=>0);
      foreach($myarray as $mydate){
        $contenitoredataarray= new Carbon($mydate);
        foreach($allievi as $allievo){
          
          $contenitoredataallievi= new Carbon($allievo->data_nascita);
          if($contenitoredataallievi->year==$contenitoredataarray->year);
          $count++;
        }
        $countMyArray=array_merge($countMyArray,array($j=>$count));
        $j++;
      }
      $prova='ciao mondo';
        return view('corsi.admin.relazioneFineIncorporamento',['Anni'=>$myarray,'totale'=>$countMyArray,]);
      }
}
