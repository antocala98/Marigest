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
        $request->validate([
            'file' => 'required|file|max:2048|mimes:xls,xlsx,csv',

        ]);
        Excel::import(new ImportIncorporandiNMRS, $request->file('file')->store('temp'));
        return back();
    }
}
