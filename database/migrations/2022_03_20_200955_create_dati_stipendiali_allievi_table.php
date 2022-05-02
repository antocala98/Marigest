<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatiStipendialiAllieviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dati_stipendiali_allievi', function (Blueprint $table) {
            $table->id();
            $table->string('azienda_bancaria');
            $table->string('agenzia');
            $table->string('indirizzo_agenzia');
            $table->string('cap_agenzia');
            $table->string('citta_agenzia');
            $table->string('iban');
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
        Schema::dropIfExists('dati_stipendiali_allievi');
    }
}
