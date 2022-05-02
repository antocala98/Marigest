<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassVeicoliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pass_veicoli', function (Blueprint $table) {
            $table->id();
            $table->string('numero_pass');
            $table->string('marca_veicolo');
            $table->string('modello_veicolo');
            $table->string('targa');
            $table->string('seconda_marca_veicolo')->nullable(true);
            $table->string('secondo_modello_veicolo')->nullable(true);
            $table->string('seconda_targa')->nullable(true);
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
        Schema::dropIfExists('pass_veicoli');
    }
}
