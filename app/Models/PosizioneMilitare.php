<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosizioneMilitare extends Model
{
    use HasFactory;

    protected $table="posizioni_militari";

    protected $fillable=[
        'ex_militare',
        'spe',
        'grado',
        'categoria',
        'specialita',
        'abilitazione',
        'forza_armata',
        'comando_provenienza',
        'data_arruolamento',
        'anzianita_grado',
        'stato_civile',
        'num_figli',
        'compamare_ascrizione',
        'pendenze_giudiziarie',
        'data_visite_periodiche',
        'data_pef',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
    
}
