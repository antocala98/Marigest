<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table="materie";

    protected $fillable=[
        'codice',
        'nome',
        'cfu',
        'anno_accademico',
        'facolta',
        'sessione',
    ];

    public function verbali(){
        return $this->hasMany(VerbaleEsame::class);
    }
}
