<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosizioniMilitariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posizioni_militari', function (Blueprint $table) {
            $table->id();
            $table->boolean('ex_militare')->nullable(true);
            $table->string('in_servizio')->nullable(true);
            $table->string('in_congedo')->nullable(true);
            $table->boolean('spe')->nullable(true);
            $table->string('grado')->nullable(true);
            $table->string('categoria')->nullable(true);
            $table->string('specialita')->nullable(true);
            $table->string('abilitazione')->nullable(true);
            $table->string('forza_armata')->nullable(true);
            $table->string('comando_provenienza')->nullable(true);
            $table->string('data_arruolamento')->nullable(true);
            $table->string('anzianta_grado')->nullable(true);
            $table->string('stato_civile')->nullable(true);
            $table->string('num_figli')->default(0);
            $table->string('num_fratelli')->default(0);
            $table->string('compamare_ascrizione');
            $table->boolean('pendenze_giudiziarie')->default(0);
            $table->string('data_visite_periodiche')->nullable(true);
            $table->string('data_pef')->nullable(true);
            $table->string('giuramento')->nullable(true);
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
        Schema::dropIfExists('posizioni_militari');
    }
}
