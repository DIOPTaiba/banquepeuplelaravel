<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtatcomptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etatcomptes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_compte')->unsigned();
            $table->foreign('id_compte')->references('id')->on('comptes');
            $table->string('etat_compte');
            $table->dateTime('date_changement_etat');
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
        Schema::dropIfExists('etatcomptes');
    }
}
