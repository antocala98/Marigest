<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllieviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allievi', function (Blueprint $table) {
            $table->id();
            $table->string('matricola_militare')->unique();
            $table->string('nome');
            $table->string('cognome');
            $table->char('sesso');
            $table->string('codice_fiscale')->unique();
            $table->string('data_nascita');
            $table->string('luogo_nascita');
            $table->string('provincia_nascita');
            $table->string('nazione_nascita');
            $table->string('matricola_universita')->unique()->nullable(true);
            $table->string('categoria')->nullable(true);
            $table->string('foto');
            $table->string('corso');
            $table->string('titolo_studio');
            $table->string('voto_diploma');
            $table->string('data_incorporamento');
            $table->string('residenza');
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
        Schema::dropIfExists('allievi');
    }
}
