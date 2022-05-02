<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stipendiale extends Model
{
    use HasFactory;

    protected $table="dati_stipendiali_allievi";

    protected $fillable=[
        'azienda_bancaria',
        'agenzia',
        'indirizzo_agenzia',
        'cap_agenzia',
        'citta_agenzia',
        'iban',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
