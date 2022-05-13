<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminJuniorCorsiController extends Controller
{
    public function ListaPersonale()
    {
        $users=User::where('sezione_appartenenza','corsi')->get();
        return view('corsi.admin_jr.home',['users'=>$users]);
    }
}
