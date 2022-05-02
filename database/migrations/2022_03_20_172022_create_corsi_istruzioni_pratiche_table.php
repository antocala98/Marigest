<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorsiIstruzioniPraticheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corsi_istruzioni_pratiche', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('anno_accademico');
            $table->string('data_inizio');
            $table->string('data_fine');
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
        Schema::dropIfExists('corsi_istruzioni_pratiche');
    }
}
