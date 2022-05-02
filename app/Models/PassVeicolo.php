<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassVeicolo extends Model
{
    use HasFactory;

    protected $table="pass_veicoli";

    protected $fillable=[
        'numero_pass',
        'marca_veicolo',
        'modello_veicolo',
        'targa',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
