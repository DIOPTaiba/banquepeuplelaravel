<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptebloquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptebloques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_compte')->unsigned();
            $table->foreign('id_compte')->references('id')->on('comptes');
            $table->string('frais_ouverture');
            $table->string('montant_remuneration');
            $table->integer('duree_blocage');
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
        Schema::dropIfExists('comptebloques');
    }
}
