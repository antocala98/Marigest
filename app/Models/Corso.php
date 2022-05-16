<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corso extends Model
{
    use HasFactory;
    protected $table="corsi";

    protected $fillable = [
        'numero_corso',
        'tipo_corso',
        'nome',
        'anno_inizio',
        'anno_fine',
    ];
}
