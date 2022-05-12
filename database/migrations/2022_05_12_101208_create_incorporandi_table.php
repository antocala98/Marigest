<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncorporandiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incorporandi', function (Blueprint $table) {
            $table->string('ID')->nullable(true);
            $table->string('ANNO')->nullable(true);
            $table->string('BLOCCO')->nullable(true);
            $table->string('INC')->nullable(true);
            $table->string('COGNOME')->nullable(true);
            $table->string('NOME')->nullable(true);
            $table->string('MATRICOLA')->nullable(true);
            $table->string('EX-MATRICOLA')->nullable(true);
            $table->string('CORPO')->nullable(true);
            $table->string('CATEGORIA')->nullable(true);
            $table->string('ABILITAZIONE')->nullable(true);
            $table->string('SPECIALITA')->nullable(true);
            $table->string('PROFILO DI IMPIEGO')->nullable(true);
            $table->string('SESSO')->nullable(true);
            $table->string('COMP')->nullable(true);
            $table->string('DATA INCORPORAMENTO')->nullable(true);
            $table->string('DATA AMMINISTRATIVA')->nullable(true);
            $table->string('CODICE FISCALE')->nullable(true);
            $table->string('DATA DI NASCITA')->nullable(true);
            $table->string('COMUNE DI NASCITA')->nullable(true);
            $table->string('PROVINCIA DI NASCITA')->nullable(true);
            $table->string('CAP DI NASCITA')->nullable(true);
            $table->string('REGIONE APP')->nullable(true);
            $table->string('COMUNE RESIDENZA')->nullable(true);
            $table->string('PROVINCIA RESIDENZA')->nullable(true);
            $table->string('INDIRIZZO RESIDENZA')->nullable(true);
            $table->string('CIVICO RESIDENZA')->nullable(true);
            $table->string('CAP RESIDENZA')->nullable(true);
            $table->string('COMUNE DOMICILIO')->nullable(true);
            $table->string('PROVINCIA DOMICILIO')->nullable(true);
            $table->string('INDIRIZZO DOMICILIO')->nullable(true);
            $table->string('NUMERO CIVICO')->nullable(true);
            $table->string('DOMICILIO')->nullable(true);
            $table->string('CAP DOMICILIO')->nullable(true);
            $table->string('CELLULARE FAMILIARE')->nullable(true);
            $table->string('CELLULARE PERSONALE')->nullable(true);
            $table->string('E-MAIL')->nullable(true);
            $table->string('PEC')->nullable(true);
            $table->string('INCORPORATO')->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incorporandi');
    }
}
