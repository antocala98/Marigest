<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class AllievoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matricola_militare' => $this->faker->randomNumber('3').'VP'.$this->faker->randomNumber('3'),
            'nome' => $this->faker->name(),
            'cognome' => $this->faker->lastName(),
            'sesso' => $this->faker->randomElement(array('m','f')),
            'codice_fiscale' => Str::random(16),
            'data_nascita' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'luogo_nascita' => $this->faker->randomElement(array('Lecce','Catania','Taranto','La Spezia','Milano','Roma','Napoli')),
            'provincia_nascita' => Str::random(2),
            'nazione_nascita' => 'Italia',
            'matricola_universita' => Str::random(8),
            'categoria' => null,
            'foto' => null,
            'corso' => $this->faker->randomElement(array('22_NMRS','23_NMRS','24 _NMRS')),
            'titolo_studio' => $this->faker->randomElement(array('Diploma Liceo Scientifico','Laurea triennale Sociologia','Liceo classico', 'Diploma tecnico industriale')) ,
            'voto_diploma' => null,
            'data_incorporamento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'data_giuridica' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'data_arrivo' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'status_attuale' => 'ARRUOLATO',
            'lavoro_precedente' => $this->faker->randomElement(array('Operaio','Militare','Elettricista','Cuoco','Studente','Falegname')),
            'provincia_residenza' => strtoupper(Str::random(2)),
            'cap_residenza' => $this->faker->randomNumber('5'),
            'indirizzo_residenza' => 'Via'.$this->faker->name().$this->faker->numberBetween(1,500),
            'luogo_residenza' => $this->faker->randomElement(array('Lecce','Catania','Taranto','La Spezia','Milano','Roma','Napoli')),
            'scalo_ferroviario' => $this->faker->randomElement(array('Lecce','Catania','Taranto','La Spezia','Milano','Roma','Napoli')),
            'comando_carabinieri' => $this->faker->randomElement(array('Lecce','Catania','Taranto','La Spezia','Milano','Roma','Napoli')),
            'tribunale' => $this->faker->randomElement(array('Lecce','Catania','Taranto','La Spezia','Milano','Roma','Napoli')),
            'motivo_arruolamento' => 'CARRIERA MILITARE',
            'sport_praticato' => $this->faker->randomElement(array('Calcio','Basket','Pallavolo','Pallanuoto','Scherma','Ginnastica artistica')),
            'livello_sport_praticato' => $this->faker->randomElement(array('Agonistico','Non agonistico')),
            'livello_lingue' => $this->faker->randomElement(array('Scolastico','Certificazione B1')),
            'lingue'=> $this->faker->randomElement(array('Inglese','Francese','Spagnolo','Tedesco','Arabo')),
            'altro_titolo_studio' => null,
            'studio_2' => null,
            'scuola_militare' =>$this->faker->randomElement(array(null, 'Morosini')),
            'freq_accademia'=> $this->faker->randomElement(array('SI','NO')),
            'ruolo_normale' => null,
            'provincia_domicilio' => strtoupper(Str::random(2)),
            'cap_domicilio' => $this->faker->randomNumber('5'),
            'indirizzo_domicilio' => 'Via'.' '.$this->faker->name().' '.$this->faker->numberBetween(1,500),
            'luogo_domicilio' => $this->faker->randomElement(array('Lecce','Catania','Taranto','La Spezia','Milano','Roma','Napoli')),
        ];
    }
}
