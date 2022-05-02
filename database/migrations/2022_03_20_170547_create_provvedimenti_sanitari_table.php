<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvvedimentiSanitariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provvedimenti_sanitari', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_provvedimento');
            $table->string('num_giorni_provvedimento')->nullable(true);  
            $table->string('data_provvedimento');
            $table->string('id_user_infermeria');
            $table->string('matricola_allievo_paziente');
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
        Schema::dropIfExists('provvedimenti_sanitari');
    }
}
