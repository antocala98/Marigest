<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentiAllieviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documenti_allievi', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento');
            $table->string('rilasciato_da');
            $table->string('num_documento');
            $table->string('data_rilascio');
            $table->string('data_scadenza');
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
        Schema::dropIfExists('documenti_allievi');
    }
}
