<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvvedimentoDisciplinare extends Model
{
    use HasFactory;
    protected $table="provvedimenti_disciplinari";

    protected $fillable=[
        'num_protocollo',
        'tipo_provvedimento',
        'num_giorni_provvedimento',
        'data_provvedimento',
        'data_notifica',
        'matricola_allievo',
        'id_user_committente',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
