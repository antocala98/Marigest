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
            $table->date('data_nascita');
            $table->string('luogo_nascita');
            $table->string('provincia_nascita');
            $table->string('nazione_nascita');
            $table->string('matricola_universita')->unique()->nullable(true);
            $table->string('categoria')->nullable(true);
            $table->string('foto')->nullable(true);;
            $table->string('corso')->nullable(true);;
            $table->string('titolo_studio')->nullable(true);;
            $table->string('voto_diploma')->nullable(true);;
            $table->date('data_incorporamento')->nullable(true);;
            $table->string('residenza')->nullable(true);;
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
