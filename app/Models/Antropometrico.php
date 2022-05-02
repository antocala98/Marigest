<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antropometrico extends Model
{
    use HasFactory;
    
    protected $table="dati_antropometrici_allievi";

    protected $fillable=[
        'tipo_capelli',
        'colore_capelli',
        'colore_occhi',
        'altezza',
        'peso',
        'num_scarpe',
        'larghezza_spalle',
        'circonferenza_testa',
        'tatuaggi_visibili',
        'descrizione_tatuaggi',
        'taglia_pantaloni',
        'taglia_t_shirt',
        'matricola_allievo',

    ];
    
    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
