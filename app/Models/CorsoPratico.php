<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorsoPratico extends Model
{
    use HasFactory;

    protected $table="corsi_istruzioni_pratiche";

    protected $fillable=[
        'nome',
        'anno_accademico',
        'data_inizio',
        'data_fine',
    ];

    public function verbali(){
        return $this->hasMany(VerbaleCorsi::class);
    }
}
