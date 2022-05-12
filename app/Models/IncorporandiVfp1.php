<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncorporandiVfp1 extends Model
{
    use HasFactory;

    protected $table="incorporandi";
    public $timestamps = false;
    protected $fillable = [
        'ID',	
        'ANNO',	
        'BLOCCO',	
        'INC',	
        'COGNOME',	
        'NOME',	
        'MATRICOLA',	
        'EX-MATRICOLA',	
        'CORPO',	
        'CATEGORIA',	
        'ABILITAZIONE',	
        'SPECIALITA',
        'PROFILO DI IMPIEGO',
        'SESSO',
        'COMP',	
        'DATA INCORPORAMENTO',	
        'DATA AMMINISTRATIVA',	
        'CODICE FISCALE',	
        'DATA DI NASCITA',	
        'COMUNE DI NASCITA',	
        'PROVINCIA DI NASCITA',	
        'CAP DI NASCITA',	
        'REGIONE APP',	
        'COMUNE RESIDENZA',	
        'PROVINCIA RESIDENZA',
        'INDIRIZZO RESIDENZA',	
        'CIVICO RESIDENZA',
        'CAP RESIDENZA',	
        'COMUNE DOMICILIO',	
        'PROVINCIA DOMICILIO',	
        'INDIRIZZO DOMICILIO',	
        'NUMERO CIVICO', 
        'DOMICILIO',	
        'CAP DOMICILIO',	
        'CELLULARE FAMILIARE',	
        'CELLULARE PERSONALE',	
        'E-MAIL',
        'PEC',	
        'INCORPORATO',

    ];
}
