<?php

namespace App\Imports;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Row;
use App\Models\Allievo;
use Illuminate\Contracts\View\View;
use PHPUnit\Framework\Error;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
HeadingRowFormatter::default('none');
class ImportIncorporandiNMRS implements ToModel, WithHeadingRow
{
    private $allievi;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    * @throws \Illuminate\Validation\ValidationException
    */
    

    public function model(array $row)
    {      
        return new Allievo([
            'matricola_militare' => $row['MATRICOLA'],
            'nome' => $row['NOME'],
            'cognome' => $row['COGNOME'],
            'sesso' => $row['Sesso'],
            'codice_fiscale' => $row['Codfisc'],
            'data_nascita' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DATNASC'])),
            'luogo_nascita' => $row['LUOGO_NASC'],
            'provincia_nascita' => $row['PROV_NASC'],
            'nazione_nascita' => $row['NAZIONE'],
            'titolo_studio' => $row['STUDIO'],
            'corso' => Auth::user()->comando_appartenenza,
            'data_incorporamento' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DATATTOARR'])),
            'residenza' => $row['LUOGO_RESI'],
        ]);

    }
	
}
