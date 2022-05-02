<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacciniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccini', function (Blueprint $table) {
            $table->id();
            $table->string('numero_lotto')->nullable(true);
            $table->string('data_vaccino');
            $table->string('durata_copertura_vaccinale');
            $table->string('tipo_vaccino');
            $table->string('matricola_allievo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccini');
    }
}
