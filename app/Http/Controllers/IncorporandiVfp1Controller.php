<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\ImportIncorporandiVfp1;
use App\Models\IncorporandiVfp1;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;



class IncorporandiVfp1Controller extends Controller
{
    public function import(Request $request) 
    {
        try {
            Excel::import(new ImportIncorporandiVfp1, $request->file('file')->store('temp'));
            return back();
        } catch (NoTypeDetectedException $e) {
            return back()->withErrors('Tipo di file non riconosciuto! Inserisci un file excel');
        }
    }
	/**
	 */
	function __construct() {
	}
}
