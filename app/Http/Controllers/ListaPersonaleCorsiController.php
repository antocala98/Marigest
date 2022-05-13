<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ListaPersonaleCorsiController extends Controller
{
    public function up()
    {
        return view('corsi.admin.home');
    }
}
