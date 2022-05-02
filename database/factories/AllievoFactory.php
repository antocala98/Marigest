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
            'matricola_militare' => Str::random(10),
            'nome' => $this->faker->name(),
            'cognome' => $this->faker->lastName(),
            'sesso' => $this->faker->randomElements(['m','f']),
            'codice_fiscale' => Str::random(16),
            'data_nascita' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'luogo_nascita' => $this->faker->city(),
            'provincia_nascita' => Str::random(2),
            'nazione_nascita' => $this->faker->country(),
            'matricola_universitaria' => Str::random(8),
            'categoria',
            'foto',
            'corso',
            'titolo_studio',
            'voto_diploma',
            'data_incorporamento',
            'residenza',
        ];
    }
}
