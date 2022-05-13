<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AggiungiDatiCorsiController extends Controller
{
    public function up(){
        return view('corsi.admin.aggiungidaticorsi');
    }
    
}
