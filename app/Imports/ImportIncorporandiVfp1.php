<?php

namespace App\Imports;
use Carbon\Carbon;
use App\Models\IncorporandiVfp1;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Row;
HeadingRowFormatter::default('none');
class ImportIncorporandiVfp1 implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {        
        return new IncorporandiVfp1([
            'ID' => $row['ID'],	
            'ANNO'  => $row['ANNO'],	
            'BLOCCO'  => $row['BLOCCO'],	
            'INC'  => $row['INC'],	
            'COGNOME'  => $row['COGNOME'],	
            'NOME'  => $row['NOME'],	
            'MATRICOLA'  => $row['MATRICOLA'],	
            'EX-MATRICOLA'  => $row['EX-MATRICOLA'],	
            'CORPO'  => $row['CORPO'],	
            'CATEGORIA'  => $row['CATEGORIA'],	
            'ABILITAZIONE'  => $row['ABILITAZIONE'],	
            'SPECIALITA'  => $row['SPECIALITA'],
            'PROFILO DI IMPIEGO'  => $row['PROFILO DI IMPIEGO'],
            'SESSO'  => $row['SESSO'],
            'COMP'  => $row['COMP'],
            'DATA INCORPORAMENTO' =>Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DATA INCORPORAMENTO'])),
            'DATA AMMINISTRATIVA' =>Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DATA AMMINISTRATIVA'])),
            'CODICE FISCALE'  => $row['CODICE FISCALE'],
            'DATA DI NASCITA'  =>Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DATA DI NASCITA'])),	
            'COMUNE DI NASCITA'  => $row['COMUNE DI NASCITA'],	
            'PROVINCIA DI NASCITA'  => $row['PROVINCIA DI NASCITA'],	
            'CAP DI NASCITA'  => $row['CAP DI NASCITA'],	
            'REGIONE APP'  => $row['REGIONE APP'],	
            'COMUNE RESIDENZA'  => $row['COMUNE RESIDENZA'],	
            'PROVINCIA RESIDENZA'  => $row['PROVINCIA RESIDENZA'],
            'INDIRIZZO RESIDENZA'  => $row['INDIRIZZO RESIDENZA'],	
            'CIVICO RESIDENZA'  => $row['CIVICO RESIDENZA'],
            'CAP RESIDENZA'  => $row['CAP RESIDENZA'],	
            'COMUNE DOMICILIO'  => $row['COMUNE DOMICILIO'],	
            'PROVINCIA DOMICILIO'  => $row['PROVINCIA DOMICILIO'],	
            'INDIRIZZO DOMICILIO'  => $row['INDIRIZZO DOMICILIO'],	
            'NUMERO CIVICO DOMICLIO'  => $row['NUMERO CIVICO DOMICILIO'], 	
            'CAP DOMICILIO'  => $row['CAP DOMICILIO'],	
            'CELLULARE FAMILIARE'  => $row['CELLULARE FAMILIARE'],	
            'CELLULARE PERSONALE'  => $row['CELLULARE PERSONALE'],	
            'E-MAIL'  => $row['E-MAIL'],
            'PEC'  => $row['PEC'],	
            'INCORPORATO'=> $row['INCORPORATO'],	
        ]);
    }
}
