<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ListaPersonaleCorsiController extends Controller
{
    public function ListaPersonale()
    {
        $users=User::where('sezione_appartenenza','corsi')->get();
        return view('corsi.admin.home',['users'=>$users]);
    }
}
