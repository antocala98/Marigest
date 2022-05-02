<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIstanzeConcorsiAllieviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('istanze_concorsi_allievi', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_concorso');
            $table->string('descrizione_concorso');
            $table->string('data_convocazione');
            $table->string('durata_concorso')->nullable(true);
            // AGGIORNARE SUCCESSIVAMENTE IN CASO DI IMPLEMENTAZIONE 
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
        Schema::dropIfExists('istanze_concorsi_allievi');
    }
}
