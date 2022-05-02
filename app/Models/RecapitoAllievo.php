<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecapitoAllievo extends Model
{
    use HasFactory;

    protected $table="recapiti_allievi";

    protected $fillable=[
        'num_cellulare',
        'email_istituzionale',
        'email_alternativa',
        'matricola_allievo',

    ];


    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
