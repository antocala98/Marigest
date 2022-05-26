<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvvedimentiDisciplinariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provvedimenti_disciplinari', function (Blueprint $table) {
            $table->id();
            $table->string('num_protocollo');
            $table->string('tipo_provvedimento');
            $table->string('num_giorni_provvedimento')->nullable(true);
            $table->string('data_provvedimento');
            $table->string('data_notifica');
            $table->string('matricola_allievo');
            $table->string('id_user_committente');
            $table->timestamps();
            $table->foreign('matricola_allievo')->references('matricola_militare')->on('allievi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provvedimenti_disciplinari');
    }
}
