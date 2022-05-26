<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;
use Carbon\Carbon;

class CorsoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $numero_corso=null;
        $classe=null;
        $tipo_corso=$this->faker->randomElement(array('NMRS','Vfp1','Vfp4'));
        do{
            $anno_inizio=$this->faker->year();
        } while ($anno_inizio < Carbon::now()->year-3 || $anno_inizio > Carbon::now()->year);
        if($tipo_corso == "NMRS"){
            $anno_fine=$anno_inizio + 3;
            $numero_corso = $this->faker->unique()->randomElement(array(18,19,20,21,22,23,24));
            if($anno_fine == Carbon::now()->year ){
                $classe="terza";
            } else if ($anno_fine == Carbon::now()->year + 1){
                $classe="seconda";
            } else if ($anno_fine == Carbon::now()->year + 2){
                $classe="prima";
            }
        } else {
            $anno_fine=$anno_inizio;
        }

        

        return [
            'numero_corso' => $numero_corso,
            'tipo_corso' => $tipo_corso,
            'nome' => $this->faker->lastName(),
            'anno_inizio' => $anno_inizio,
            'anno_fine' => $anno_fine,
            'classe' => $classe,
        ];
    }
}
