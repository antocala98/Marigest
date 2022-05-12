<?php

namespace App\Imports;

use App\Models\IncorporandiVfp1;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportIncorporandiVfp1 implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new IncorporandiVfp1([
            'ID' => $row[0],	
            'ANNO'  => $row[1],	
            'BLOCCO'  => $row[2],	
            'INC'  => $row[3],	
            'COGNOME'  => $row[4],	
            'NOME'  => $row[5],	
            'MATRICOLA'  => $row[6],	
            'EX-MATRICOLA'  => $row[7],	
            'CORPO'  => $row[8],	
            'CATEGORIA'  => $row[9],	
            'ABILITAZIONE'  => $row[10],	
            'SPECIALITA'  => $row[11],
            'PROFILO DI IMPIEGO'  => $row[12],
            'SESSO'  => $row[13],
            'COMP'  => $row[14],	
            'DATA INCORPORAMENTO'  => $row[15],	
            'DATA AMMINISTRATIVA'  => $row[16],	
            'CODICE FISCALE'  => $row[17],	
            'DATA DI NASCITA'  => $row[18],	
            'COMUNE DI NASCITA'  => $row[19],	
            'PROVINCIA DI NASCITA'  => $row[20],	
            'CAP DI NASCITA'  => $row[21],	
            'REGIONE APP'  => $row[22],	
            'COMUNE RESIDENZA'  => $row[23],	
            'PROVINCIA RESIDENZA'  => $row[24],
            'INDIRIZZO RESIDENZA'  => $row[25],	
            'CIVICO RESIDENZA'  => $row[26],
            'CAP RESIDENZA'  => $row[27],	
            'COMUNE DOMICILIO'  => $row[28],	
            'PROVINCIA DOMICILIO'  => $row[29],	
            'INDIRIZZO DOMICILIO'  => $row[30],	
            'NUMERO CIVICO'  => $row[31], 
            'DOMICILIO'  => $row[32],	
            'CAP DOMICILIO'  => $row[33],	
            'CELLULARE FAMILIARE'  => $row[34],	
            'CELLULARE PERSONALE'  => $row[35],	
            'E-MAIL'  => $row[36],
            'PEC'  => $row[37],	
            'INCORPORATO'  => $row[38],
        ]);
    }
}
