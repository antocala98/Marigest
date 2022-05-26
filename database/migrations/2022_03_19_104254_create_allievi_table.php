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
            $table->string('codice_fiscale');
            $table->date('data_nascita');
            $table->string('luogo_nascita');
            $table->string('provincia_nascita');
            $table->string('nazione_nascita');
            $table->string('matricola_universita')->nullable(true);
            $table->string('categoria')->nullable(true);
            $table->string('foto')->nullable(true);
            $table->string('corso')->nullable(true);
            $table->string('titolo_studio')->nullable(true);
            $table->string('voto_diploma')->nullable(true);
            $table->date('data_incorporamento')->nullable(true);
            $table->date('data_giuridica')->nullable(true);
            $table->date('data_arrivo')->nullable(true);
            $table->string('status_attuale')->nullable(true);
            $table->string('lavoro_precedente')->nullable(true);
            $table->string('luogo_residenza')->nullable(true);
            $table->string('provincia_residenza')->nullable(true);
            $table->string('cap_residenza')->nullable(true);
            $table->string('indirizzo_residenza')->nullable(true);
            $table->string('scalo_ferroviario')->nullable(true);
            $table->string('comando_carabinieri')->nullable(true);
            $table->string('tribunale')->nullable(true);
            $table->string('motivo_arruolamento')->nullable(true);
            $table->string('sport_praticato')->nullable(true);
            $table->string('livello_sport_praticato')->nullable(true);
            $table->string('livello_lingue')->nullable(true);
            $table->string('lingue')->nullable(true);
            $table->string('altro_titolo_studio')->nullable(true);
            $table->string('studio_2')->nullable(true);
            $table->string('scuola_militare')->nullable(true);
            $table->string('freq_accademia')->nullable(true);
            $table->string('ruolo_normale')->nullable(true);
            $table->string('luogo_domicilio')->nullable(true);
            $table->string('provincia_domicilio')->nullable(true);
            $table->string('cap_domicilio')->nullable(true);
            $table->string('indirizzo_domicilio')->nullable(true);
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
