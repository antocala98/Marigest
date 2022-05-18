<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class GestionePersonaleCorsiController extends Controller
{
    public function up(){
        $users=User::where('sezione_appartenenza','corsi')->get();
        return view('corsi.admin.gestionepersonalecorsi',['users'=>$users]);
    }
}

