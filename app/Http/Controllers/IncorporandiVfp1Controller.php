<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\ImportIncorporandiVfp1;
use App\Models\IncorporandiVfp1;


class IncorporandiVfp1Controller extends Controller
{
    public function import(Request $request) 
    {
        Excel::import(new ImportIncorporandiVfp1, $request->file('file')->store('temp'));
        return back();
    }
}
