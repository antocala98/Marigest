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
            $table->string('grado_parentela');
            $table->string('citta_residenza');
            $table->string('cap_residenza');
            $table->string('indirizzo_residenza');
            $table->string('recapito_telefonico');
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
