<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfiloSanitario extends Model
{
    use HasFactory;

    protected $table="profili_sanitari_allievi";

    protected $fillable=[
        'gruppo_sanguigno',
        'fattore_rh',
        'asl_appartenenza',
        'idoneita_lq',
        'id_user',
        'matricola_allievo',

    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
    
}
