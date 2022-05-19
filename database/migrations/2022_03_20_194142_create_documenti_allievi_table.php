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
            $table->string('tipo_documento')->nullable(true);
            $table->string('rilasciato_da')->nullable(true);
            $table->string('num_documento')->nullable(true);
            $table->string('data_rilascio')->nullable(true);
            $table->string('data_scadenza')->nullable(true);
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
