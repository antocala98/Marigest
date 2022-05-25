<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allievo extends Model
{
    protected $table="allievi";
    use HasFactory;

    protected $fillable = [
        'matricola_militare',
        'nome',
        'cognome',
        'sesso',
        'codice_fiscale',
        'data_nascita',
        'luogo_nascita',
        'provincia_nascita',
        'nazione_nascita',
        'matricola_universita',
        'categoria',
        'foto',
        'corso',
        'titolo_studio',
        'voto_diploma',
        'data_incorporamento',
        'data_giuridica',
        'data_arrivo',
        'status_attuale',
        'lavoro_precedente',
        'provincia_residenza',
        'cap_residenza',
        'indirizzo_residenza',
        'luogo_residenza',
        'scalo_ferroviario',
        'comando_carabinieri',
        'tribunale',
        'motivo_arruolamento',
        'sport_praticato',
        'livello_sport_praticato',
        'livello_lingue',
        'lingue',
        'altro_titolo_studio',
        'studio_2',
        'scuola_militare',
        'freq_accademia',
        'ruolo_normale',
        'provincia_domicilio',
        'cap_domicilio',
        'indirizzo_domicilio',
        'luogo_domicilio',
    ];


    public function provvedimentiDisciplinari(){
        return $this->hasMany(ProvvedimentoDisciplinare::class);
    }

    public function provvedimentiSanitari(){
        return $this->hasMany(ProvvedimentoSanitario::class);
    }
    
    public function verbaliEsami(){
        return $this->hasMany(VerbaleEsame::class);
    }

    public function verbaliCorsiVari(){
        return $this->hasMany(VerbaleCorsi::class);
    }

    public function posizioneMilitare(){
        return $this->hasOne(PosizioneMilitare::class);
    }

    public function documentiAllievi(){
        return $this->hasMany(Documento::class);
    }

    public function recapitiAllievo(){
        return $this->hasOne(RecapitoAllievo::class);
    }

    public function datoAntropometrico(){
        return $this->hasOne(Antropometrico::class);
    }

    public function corsiSicurezzaMilitari(){
        return $this->hasMany(CorsoSicurezzaMilitare::class);
    }

    public function attagliamento(){
        return $this->hasOne(Attagliamento::class);
    }

    public function passVeicolo(){
        return $this->hasOne(PassVeicolo::class);
    }

    public function stipendiale(){
        return $this->hasOne(Stipendiale::class);
    }
    
    public function profiloSanitario(){
        return $this->hasOne(ProfiloSanitario::class);
    }

    public function istanzeConcorsi(){
        return $this->hasMany(IstanzaConcorso::class);
    }

    public function familiari(){
        return $this->hasMany(Familiare::class);
    }

    public function vaccini(){
        return $this->hasMany(Vaccino::class);
    }

    public function covid(){
        return $this->hasMany(Covid::class);
    }

    public function dispositivi(){
        return $this->hasMany(Dispositivo::class);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
