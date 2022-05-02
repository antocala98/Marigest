<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfiliSanitariAllieviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profili_sanitari_allievi', function (Blueprint $table) {
            $table->id();
            $table->string('gruppo_sanguigno');
            $table->string('fattore_rh');
            $table->string('asl_appartenenza');
            $table->boolean('idoneita_lq')->nullable(true);
            $table->string('id_user');
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
        Schema::dropIfExists('profili_sanitari_allievi');
    }
}
