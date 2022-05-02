<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Allievo;

class AllievoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Allievo::factory()->count(50)->create()->each(function ($customer) {
            $customer->save();
        });
    }
}
