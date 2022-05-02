<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materie', function (Blueprint $table) {
            $table->id();
            $table->string('codice');
            $table->string('nome');
            $table->string('cfu');
            $table->string('anno_accademico');
            $table->string('facolta');
            $table->string('sessione');
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
        Schema::dropIfExists('materie');
    }
}
