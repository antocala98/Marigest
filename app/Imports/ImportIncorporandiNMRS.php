<?php

namespace App\Imports;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Row;
use App\Models\Allievo;
HeadingRowFormatter::default('none');
class ImportIncorporandiNMRS implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {        
        return new Allievo([
            'matricola_militare' => $row['MATRICOLA'],
            'nome' => $row['NOME'],
            'cognome' => $row['COGNOME'],
            'sesso' => $row['Sesso'],
            'codice_fiscale' => $row['Codfisc'],
            'data_nascita' => $row['DATNASC'],
            'luogo_nascita' => $row['LUOGO_NASC'],
            'provincia_nascita' => $row['PROV_NASC'],
            'nazione_nascita' => $row['NAZIONE'],
            'titolo_studio' => $row['STUDIO'],
            'data_incorporamento' => $row['DATATTOARR'],
            'residenza' => $row['LUOGO_RESI'],
        ]);
    }
}
