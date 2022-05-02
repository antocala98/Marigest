<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    use HasFactory;

    protected $table="covid";

    protected $fillable=[
        'data_positivita',
        'data_guarigione',
        'matricola_allievo',
    ];

    public function allievo(){
        return $this->belongsTo(Allievo::class);
    }
}
