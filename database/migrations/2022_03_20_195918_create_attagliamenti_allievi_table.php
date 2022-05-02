<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttagliamentiAllieviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attagliamenti_allievi', function (Blueprint $table) {
            $table->id();
            $table->string('taglia_operativa');
            $table->string('taglia_ordinaria_invernale');
            $table->string('taglia_impermeabile');
            $table->string('taglia_scarpe_antinfortunistiche');
            $table->string('taglia_cappottina');
            $table->string('taglia_seb');
            $table->string('taglia_farsetto_bianco');
            $table->string('taglia_farsetto_blu');
            $table->string('taglia_cappotta_navigazione');
            $table->string('taglia_overall');
            $table->string('taglia_maglione');
            $table->string('taglia_giubbino_divisa');
            $table->string('taglia_polo_blu');
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
        Schema::dropIfExists('attagliamenti_allievi');
    }
}
