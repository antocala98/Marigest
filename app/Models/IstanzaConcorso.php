<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IstanzaConcorso extends Model
{
    use HasFactory;

    protected $table="istanze_concorsi_allievi";

    protected $fillable=[
        'tipo_concorso',
        'descrizione_concorso',
        'data_convocazione',
        'durata_concorso',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
