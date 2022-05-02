<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attagliamento extends Model
{
    use HasFactory;

    protected $table= "attagliamenti_allievi";

    protected $fillable=[
        'taglia_operativa',
        'taglia_ordinaria_invernale',
        'taglia_impermeabile',
        'taglia_scarpe_antinfortunistiche',
        'taglia_cappottina',
        'taglia_seb',
        'taglia_farsetto_bianco',
        'taglia_farsetto_blu',
        'taglia_cappotta_navigazione',
        'taglia_overall',
        'taglia_maglione',
        'taglia_giubbino_divisa',
        'taglia_polo_blu',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}


