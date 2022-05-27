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
        

        $totaleNord=0;
        $percentualeNord=0;
        $nomeNord='Nord';
        
        $totaleCentro=0;
        $percentualeCentro=0;
        $nomeCentro='Centro';
        
        $totaleSud=0;
        $percentualeSud=0;
        $nomeSud='Sud';
        

        $totaleNord= Allievo::where('corso', Auth::user()->comando_appartenenza)
        
        ->Where(function($query) {
          //Emilia Romagna
          $query->orwhere('provincia_residenza','FC')
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
                ->orwhere('provincia_residenza','VR');
              })->count();

                $totaleCentro= Allievo::where('corso', Auth::user()->comando_appartenenza)
                ->Where(function($query) {
                  $query->orwhere('provincia_residenza','AQ')
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
                  ->orwhere('provincia_residenza','TR');
                

                })->count();
                //Abruzzo
                

        $totaleSud= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','MT')
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
          ->orwhere('provincia_residenza','TP');
        })->count();

        
        
        
        if((Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100>0){
          $percentualeNord=$totaleNord/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeCentro=$totaleCentro/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeSud=$totaleSud/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
        }else{
          $percentualeNord=0;
          $percentualeCentro=0;
          $percentualeSud=0;
        }
        

        $areaNord = collect(['nomeNord'=>$nomeNord, 'totaleNord'=>$totaleNord,'percentualeNord'=> $percentualeNord]);
        $areaCentro = collect(['nomeCentro'=>$nomeCentro, 'totaleCentro'=>$totaleCentro,'percentualeCentro'=> $percentualeCentro]);
        $areaSud = collect(['nomeSud'=>$nomeSud,'totaleSud'=> $totaleSud,'percentualeSud'=> $percentualeSud]);
        $area=collect(['nord'=>$areaNord,'centro'=> $areaCentro,'sud'=> $areaSud]);



        $totaleAbruzzo=0;
        $percentualeAbruzzo=0;

        $totaleBasilicata=0;
        $percentuaBasilicata=0;

        $totaleCalabria=0;
        $percentualeCalabria=0;

        $totaleCampania=0;
        $percentualeCampania=0;

        $totaleEmilia=0;
        $percentualeEmilia=0;

        $totaleFriuli=0;
        $percentualeFriuli=0;

        $totaleLazio=0;
        $percentualeLazio=0;

        $totaleLiguria=0;
        $percentualeLiguria=0;

        $totaleLombardia=0;
        $percentualeLombardia=0;

        $totaleMarche=0;
        $percentualeMarche=0;

        $totaleMolise=0;
        $percentualeMolise=0;

        $totalePiemonte=0;
        $percentualePiemonte=0;

        $totalePuglia=0;
        $percentualePuglia=0;

        $totaleSardegna=0;
        $percentualeSardegna=0;

        $totaleSicilia=0;
        $percentualeSicilia=0;

        $totaleToscana=0;
        $percentualeToscana=0;

        $totaleTrentino=0;
        $percentualeTrentino=0;

        $totaleUmbria=0;
        $percentualeUmbria=0;

        $totaleValle=0;
        $percentualeValle=0;

        $totaleVeneto=0;
        $percentualeVeneto=0;

        $totaleAbruzzo= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','AQ')
          ->orwhere('provincia_residenza','CH')
          ->orwhere('provincia_residenza','PE')
          ->orwhere('provincia_residenza','TE');
        })
        //Abruzzo
        ->count();

        $totaleBasilicata= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','MT')
          ->orwhere('provincia_residenza','PZ');
        })

        //Basilicata
        ->count();

        $totaleCalabria= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','CS')
          ->orwhere('provincia_residenza','CZ')
          ->orwhere('provincia_residenza','KR')
          ->orwhere('provincia_residenza','RC')
          ->orwhere('provincia_residenza','VV');
        })

        //Calabria
        ->count();
        $totaleCampania= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','AV')
          ->orwhere('provincia_residenza','BN')
          ->orwhere('provincia_residenza','CE')
          ->orwhere('provincia_residenza','NA')
          ->orwhere('provincia_residenza','SA');
        })

        //Campania
        ->count();
        $totaleEmilia= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','BO')
          ->orwhere('provincia_residenza','FC')
          ->orwhere('provincia_residenza','FE')
          ->orwhere('provincia_residenza','MO')
          ->orwhere('provincia_residenza','PC')
          ->orwhere('provincia_residenza','PR')
          ->orwhere('provincia_residenza','RA')
          ->orwhere('provincia_residenza','RE')
          ->orwhere('provincia_residenza','RN');
        })
        //Emilia Romagna
        ->count();
        $totaleFriuli= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','GO')
          ->orwhere('provincia_residenza','PN')
          ->orwhere('provincia_residenza','TS')
          ->orwhere('provincia_residenza','UD');
        })
        //friuli veneia Giulia
        ->count();
        $totaleLazio= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','FR')
          ->orwhere('provincia_residenza','LT')
          ->orwhere('provincia_residenza','RI')
          ->orwhere('provincia_residenza','RO')
          ->orwhere('provincia_residenza','Roma')
          ->orwhere('provincia_residenza','VT');
        })
        //Lazio
        ->count();
        $totaleLiguria= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','GE')
          ->orwhere('provincia_residenza','IM')
          ->orwhere('provincia_residenza','SP')
          ->orwhere('provincia_residenza','SV');
        })
        //Liguria
        ->count();
        $totaleLombardia= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','BG')
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
          ->orwhere('provincia_residenza','VA');
        })
        //Lombardia
        ->count();
        $totaleMarche= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','AN')
          ->orwhere('provincia_residenza','AP')
          ->orwhere('provincia_residenza','FM')
          ->orwhere('provincia_residenza','MC')
          ->orwhere('provincia_residenza','PU');
        })
        //Marche
        ->count();
        $totaleMolise= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','CB')
          ->orwhere('provincia_residenza','IS');
        })
        //Molise
        ->count();
        $totalePiemonte= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','AL')
          ->orwhere('provincia_residenza','AT')
          ->orwhere('provincia_residenza','BI')
          ->orwhere('provincia_residenza','CN')
          ->orwhere('provincia_residenza','NO')
          ->orwhere('provincia_residenza','TO')
          ->orwhere('provincia_residenza','VB')
          ->orwhere('provincia_residenza','VC');
        })
        //Piemonte
        ->count();
        $totalePuglia= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','BR')
          ->orwhere('provincia_residenza','BA')
          ->orwhere('provincia_residenza','BT')
          ->orwhere('provincia_residenza','FG')
          ->orwhere('provincia_residenza','LE')
          ->orwhere('provincia_residenza','TA');
        })
        //pUGLIA
        ->count();
        $totaleSardegna= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','CA')
          ->orwhere('provincia_residenza','CI')
          ->orwhere('provincia_residenza','NU')
          ->orwhere('provincia_residenza','OG')
          ->orwhere('provincia_residenza','OR')
          ->orwhere('provincia_residenza','OT')
          ->orwhere('provincia_residenza','SS')
          ->orwhere('provincia_residenza','vs');
        })
        //SARDEGNA
        ->count();
        $totaleSardegna= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','AG')
          ->orwhere('provincia_residenza','CL')
          ->orwhere('provincia_residenza','CT')
          ->orwhere('provincia_residenza','EN')
          ->orwhere('provincia_residenza','ME')
          ->orwhere('provincia_residenza','PA')
          ->orwhere('provincia_residenza','RG')
          ->orwhere('provincia_residenza','SR')
          ->orwhere('provincia_residenza','TP');
        })
        //SICILIA
        ->count();
        $totaleToscana= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','AR')
          ->orwhere('provincia_residenza','FI')
          ->orwhere('provincia_residenza','GR')
          ->orwhere('provincia_residenza','LI')
          ->orwhere('provincia_residenza','LU')
          ->orwhere('provincia_residenza','MS')
          ->orwhere('provincia_residenza','PI')
          ->orwhere('provincia_residenza','PO')
          ->orwhere('provincia_residenza','PT')
          ->orwhere('provincia_residenza','SI');
        })
        //TOSCANA
        ->count();
        $totaleTrentino= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','BZ')
          ->orwhere('provincia_residenza','TN');
        })
        //TRENTINO
        ->count();
        $totaleUmbria= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','PG')
          ->orwhere('provincia_residenza','TR');
        })
        //UMBRIA
        ->count();
        $totaleValle= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','AO');
        })
        //VALLE D'AOSTA
        ->count();
        $totaleVeneto= Allievo::where('corso', Auth::user()->comando_appartenenza)
        ->Where(function($query) {
          $query->orwhere('provincia_residenza','BL')
          ->orwhere('provincia_residenza','PD')
          ->orwhere('provincia_residenza','RO')
          ->orwhere('provincia_residenza','TV')
          ->orwhere('provincia_residenza','VE')
          ->orwhere('provincia_residenza','VI')
          ->orwhere('provincia_residenza','VR');
        })
        //VENETO
        ->count();

        if((Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100>0){
          $percentualeAbruzzo=$totaleAbruzzo/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentuaBasilicata=$totaleBasilicata/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeCalabria=$totaleCalabria/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeCampania=$totaleCampania/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeEmilia=$totaleEmilia/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeFriuli=$totaleFriuli/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeLazio=$totaleLazio/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeLiguria=$totaleLiguria/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeLombardia=$totaleLombardia/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeMarche=$totaleMarche/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeMolise=$totaleMolise/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualePiemonte=$totalePiemonte/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualePuglia=$totalePuglia/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeSardegna=$totaleSardegna/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeSicilia=$totaleSicilia/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeToscana=$totaleToscana/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeTrentino=$totaleTrentino/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeUmbria=$totaleUmbria/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeValle=$totaleValle/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
          $percentualeVeneto=$totaleVeneto/(Allievo::where('corso', Auth::user()->comando_appartenenza)->count())*100;
        }else{
          $percentualeAbruzzo=0;
          $percentuaBasilicata=0;
          $percentualeCalabria=0;
          $percentualeCampania=0;
          $percentualeEmilia=0;
          $percentualeFriuli=0;
          $percentualeLazio=0;
          $percentualeLiguria=0;
          $percentualeLombardia=0;
          $percentualeMarche=0;
          $percentualeMolise=0;
          $percentualePiemonte=0;
          $percentualePuglia=0;
          $percentualeSardegna=0;
          $percentualeSicilia=0;
          $percentualeToscana=0;
          $percentualeTrentino=0;
          $percentualeUmbria=0;
          $percentualeValle=0;
          $percentualeVeneto=0;
          
        }
        

        $regioneAbruzzo = collect(['totaleAbruzzo'=>$totaleAbruzzo,'percentualeAbruzzo'=> $percentualeAbruzzo]);
        $regioneBasilicata = collect(['totaleBasilicata'=>$totaleBasilicata,'percentualeBasilicata'=> $percentuaBasilicata]);
        $regioneCalabria = collect(['totaleCalabria'=>$totaleCalabria,'percentualeCalabria'=> $percentualeCalabria]);
        $regioneCampania = collect(['totaleCampania'=>$totaleCampania,'percentualeCampania'=> $percentualeCampania]);
        $regioneEmilia = collect(['totaleEmilia'=>$totaleEmilia,'percentualeEmilia'=> $percentualeEmilia]);
        $regioneFriuli = collect(['totaleFriuli'=>$totaleFriuli,'percentualeEFriuli'=> $percentualeFriuli]);
        $regioneLazio = collect(['totaleLazio'=>$totaleLazio,'percentualeLazio'=> $percentualeLazio]);
        $regioneLiguria = collect(['totaleLiguria'=>$totaleLiguria,'percentualeLiguria'=> $percentualeLiguria]);
        $regioneLombardia = collect(['totaleLombardia'=>$totaleLombardia,'percentualeLombardia'=> $percentualeLombardia]);
        $regioneMarche = collect(['totaleMarche'=>$totaleMarche,'percentualeMarche'=> $percentualeMarche]);
        $regioneMolise = collect(['totaleMolise'=>$totaleMolise,'percentualeMolise'=> $percentualeMolise]);
        $regionePiemonte = collect(['totalePiemonte'=>$totalePiemonte,'percentualePiemonte'=> $percentualePiemonte]);
        $regionePuglia = collect(['totalePuglia'=>$totalePuglia,'percentualePuglia'=> $percentualePuglia]);
        $regioneSardegna = collect(['totaleSardegna'=>$totaleSardegna,'percentualeSardegna'=> $percentualeSardegna]);
        $regioneSicilia = collect(['totaleSicilia'=>$totaleSicilia,'percentualeSicilia'=> $percentualeSicilia]);
        $regioneToscana = collect(['totaleToscana'=>$totaleToscana,'percentualeToscana'=> $percentualeToscana]);
        $regioneTrentino = collect(['totaleTrentino'=>$totaleTrentino,'percentualeTrentino'=> $percentualeTrentino]);
        $regioneUmbria = collect(['totaleUmbria'=>$totaleUmbria,'percentualeUmbria'=> $percentualeUmbria]);
        $regioneValle = collect(['totaleValle'=>$totaleValle,'percentualeValle'=> $percentualeValle]);
        $regioneVeneto = collect(['totaleVeneto'=>$totaleVeneto,'percentualeVeneto'=> $percentualeVeneto]);
        
        $regione=collect([
          'abruzzo'=>$regioneAbruzzo,
          'basilicata'=> $regioneBasilicata,
          'calabria'=> $regioneCalabria,
          'campania'=> $regioneCampania,
          'emilia'=> $regioneEmilia,
          'friuli'=> $regioneFriuli,
          'lazio'=> $regioneLazio,
          'liguria'=> $regioneLiguria,
          'lombardia'=> $regioneLombardia,
          'marche'=> $regioneMarche,
          'molise'=> $regioneMolise,
          'piemonte'=> $regionePiemonte,
          'puglia'=> $regionePuglia,
          'sardegna'=> $regioneSardegna,
          'sicilia'=> $regioneSicilia,
          'toscana'=> $regioneToscana,
          'trentino'=> $regioneTrentino,
          'umbria'=> $regioneUmbria,
          'valle'=> $regioneValle,
          'veneto'=> $regioneVeneto,
        ]);

        return view('corsi.admin.resoconti.relazioneFineIncorporamento',['Anni'=>$allievi,'area'=>$area,'regione'=>$regione]);
      }
}
