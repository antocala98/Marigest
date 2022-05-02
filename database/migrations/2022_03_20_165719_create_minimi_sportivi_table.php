<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinimiSportiviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minimi_sportivi', function (Blueprint $table) {
            $table->id();
            $table->string('disciplina');
            $table->string('livello_uomini_o_30');
            $table->string('livello_uomini_u_30');
            $table->string('livello_donne_o_30');
            $table->string('livello_donne_u_30');
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
        Schema::dropIfExists('minimi_sportivi');
    }
}
