<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoSportivo extends Model
{
    use HasFactory;
    protected $table="minimi_sportivi";

    protected $fillable=[
        'disciplina',
        'tipologia',
        'livello_uomini_o_30',
        'livello_uomini_u_30',
        'livello_donne_o_30',
        'livello_donne_u_30',
    ];
}
