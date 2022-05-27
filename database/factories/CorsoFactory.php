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
        
       
   
        $data_inizio=$this->faker->date();
        
        
        
        $date = Carbon::parse($data_inizio); 
        $now = Carbon::now(); 
        $diff = $date->diffInDays($now); 
            
       
        if($tipo_corso == 'NMRS'){
            $numero_corso = $this->faker->unique()->randomElement(array(18,19,20,21,22,23,24));

            if($diff < 365){
                $classe='prima';
            } else if($diff >= 365 && $diff < 730){
                $classe='seconda';
            } else if($diff >= 730){
                $classe='terza';
            }

            do{
                $data_inizio=$this->faker->date();
            }while(Carbon::parse($data_inizio)->year < Carbon::now()->year - 3 || Carbon::parse($data_inizio)->year > Carbon::now()->year || Carbon::parse($data_inizio)->month != 9 );
            
    
        }
        

        return [
            'numero_corso' => $numero_corso,
            'tipo_corso' => $tipo_corso,
            'nome' => $this->faker->lastName(),
            'data_inizio' => $data_inizio,
            'classe' => $classe,
        ];
    }
}
