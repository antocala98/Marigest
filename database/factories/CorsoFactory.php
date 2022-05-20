<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class CorsoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $tipo_corso=$this->faker->randomElement(array('NMRS','Vfp1','Vfp4'));
        $anno_inizio=$this->faker->year();
        if($tipo_corso == "NMRS"){
            $anno_fine=$anno_inizio + 3;
        } else {
            $anno_fine=$anno_inizio;
        }

        return [
            'numero_corso' => $this->faker->unique()->randomElement(array(18,19,20,21,22,23,24)),
            'tipo_corso'=> $tipo_corso,
            'nome' => $this->faker->lastName(),
            'anno_inizio' => $anno_inizio,
            'anno_fine' => $anno_fine,
        ];
    }
}
