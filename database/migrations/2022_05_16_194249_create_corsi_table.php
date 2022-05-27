<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corsi', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_corso')->nullable(true);
            $table->string('tipo_corso')->nullable(true);
            $table->string('nome')->nullable(true);
            $table->date('data_inizio')->nullable(true);
            $table->string('classe')->nullable(true);
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
        Schema::dropIfExists('corsi');
    }
}
