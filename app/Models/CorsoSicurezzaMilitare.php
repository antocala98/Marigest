<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorsoSicurezzaMilitare extends Model
{
    use HasFactory;

    protected $table="corsi_sicurezza_o_militari";

    protected $fillable=[
        'descrizione_corso',
        'data_inizio_corso',
        'data_fine_corso',
        'voto',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
