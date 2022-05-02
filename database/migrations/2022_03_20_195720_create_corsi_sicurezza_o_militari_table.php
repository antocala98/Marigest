<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorsiSicurezzaOMilitariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corsi_sicurezza_o_militari', function (Blueprint $table) {
            $table->id();
            $table->string('descrizione_corso');
            $table->string('data_inizio_corso');
            $table->string('data_fine_corso');
            $table->string('voto')->nullable(true);
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
        Schema::dropIfExists('corsi_sicurezza_o_militari');
    }
}
