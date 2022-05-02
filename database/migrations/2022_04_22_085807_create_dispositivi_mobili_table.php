<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositiviMobiliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivi_mobili', function (Blueprint $table) {
            $table->id();
            $table->string('codice_imei');
            $table->string('modello_dispositivo');
            $table->string('marca_dispositivo');
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
        Schema::dropIfExists('dispositivi_mobili');
    }
}
