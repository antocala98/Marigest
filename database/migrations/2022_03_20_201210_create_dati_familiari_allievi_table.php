<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatiFamiliariAllieviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dati_familiari_allievi', function (Blueprint $table) {
            $table->id();
            $table->string('cognome')->nullable(true);
            $table->string('nome')->nullable(true);
            $table->string('grado_parentela')->nullable(true);
            $table->string('citta_residenza')->nullable(true);
            $table->string('provincia_residenza')->nullable(true);
            $table->string('cap_residenza')->nullable(true);
            $table->string('indirizzo_residenza')->nullable(true);
            $table->string('recapito_telefonico')->nullable(true);
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
        Schema::dropIfExists('dati_familiari_allievi');
    }
}
