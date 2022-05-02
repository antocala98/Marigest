<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecapitiAllieviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recapiti_allievi', function (Blueprint $table) {
            $table->id();
            $table->string('num_cellulare');
            $table->string('email_istituzionale')->nullable(true);
            $table->string('email_alternativa');
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
        Schema::dropIfExists('recapiti_allievi');
    }
}
