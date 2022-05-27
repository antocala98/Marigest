<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerbaleSportivo extends Model
{
    use HasFactory;

    protected $table="VerbaleSportivo";

    protected $fillable=[
        'codice_verbale',
        'disciplina',
        'matricola_allievo',
        'data_verbale',
        'voto',
        'id_user_redattore',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class);
    }
}
