<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Corso;

class CorsoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Corso::factory()->count(5)->create();
    }
}
