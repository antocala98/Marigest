<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportIncorporandiNMRS;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;

class IncorporandiNMRSController extends Controller
{
    public function import(Request $request) 
    {
        try {
            Excel::import(new ImportIncorporandiNMRS, $request->file('file')->store('temp'));
            return back();
        } catch (NoTypeDetectedException $e) {
            return back()->withErrors('Tipo di file non riconosciuto! Inserisci un file excel');
        }
    }
}
