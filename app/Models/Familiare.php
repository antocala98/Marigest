<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familiare extends Model
{
    use HasFactory;

    protected $table="dati_familiari_allievi";

    protected $fillable=[
        'nome',
        'cognome',
        'grado_parentela',
        'citta_residenza',
        'cap_residenza',
        'indirizzo_residenza',
        'provincia_residenza',
        'recapito_telefonico',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
