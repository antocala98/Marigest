<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccino extends Model
{
    use HasFactory;

    protected $table="vaccini";

    protected $fillable=[
        'numero_lotto',
        'data_vaccino',
        'durata_copertura_vaccinale',
        'tipo_vaccino',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
