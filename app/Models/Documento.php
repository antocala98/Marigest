<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table="docuemnti_allievi";

    protected $fillable=[
        'tipo_documento',
        'rilasciato_da',
        'num_documento',
        'data_rilascio',
        'data_scadenza',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
