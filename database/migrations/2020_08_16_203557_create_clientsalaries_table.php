<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientsalaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id')->on('clients');
            $table->string('nom');
            $table->string('prenom');
            $table->string('carte_identite');
            $table->string('profession');
            $table->string('salaire');
            $table->string('nom_employeur');
            $table->string('adresse_entreprise');
            $table->string('raison_social');
            $table->string('identifiant_entreprise');
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
        Schema::dropIfExists('clientsalaries');
    }
}
