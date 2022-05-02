<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerbaleCorsi extends Model
{
    use HasFactory;

    protected $table="verbali_corsi_vari";

    protected $fillable=[
        'codice_verbale',
        'id_corso_ip',
        'voto',
        'ufficiale_commissione',
        'matricola_allievo',
        'id_user_redattore',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }

    public function corsoIstruzioniPratiche(){
        return $this->belongsTo(CorsoPratico::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



    
}
