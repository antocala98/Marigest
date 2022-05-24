<?php

namespace App\Http\Controllers;
use App\Models\Allievo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class relazioneIncorporamentoController extends Controller
{
    public function relazioneAnno(){
        return view('corsi.admin.relazioneFineIncorporamento');
      }
}
