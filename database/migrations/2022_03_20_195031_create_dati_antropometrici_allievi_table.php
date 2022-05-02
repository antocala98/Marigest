<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatiAntropometriciAllieviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dati_antropometrici_allievi', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_capelli');
            $table->string('colore_capelli');
            $table->string('colore_occhi');
            $table->string('altezza');
            $table->string('peso');
            $table->string('num_scarpe');
            $table->string('larghezza_spalle');
            $table->string('circonferenza_testa');
            $table->string('tatuaggi_visibili')->default('No');
            $table->string('descrizione_tatuaggi')->nullable(true);
            $table->string('taglia_pantaloni');
            $table->string('taglia_t_shirt');
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
        Schema::dropIfExists('dati_antropometrici_allievi');
    }
}
