<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvvedimentoSanitario extends Model
{
    use HasFactory;

    
    protected $table="provvedimenti_sanitari";

    protected $fillable=[
        'tipo_provvedimento',
        'num_giorni_provvedimento',
        'data_provvedimento',
        'id_user_infermeria',
        'matricola_allievo_paziente',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }

}
