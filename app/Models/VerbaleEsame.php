<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerbaleEsame extends Model
{
    use HasFactory;

    protected $table="verbali_esami";

    protected $fillable=[
        'codice_verbale',
        'codice_materia',
        'data_verbale',
        'voto',
        'ufficiale_commissione',
        'matricola_allievo',
        'id_user_redattore',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function materia(){
        return $this->belongsTo(Materia::class);
    }
}
