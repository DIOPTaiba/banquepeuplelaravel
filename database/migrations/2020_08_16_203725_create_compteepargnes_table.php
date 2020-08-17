<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteepargnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteepargnes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_compte')->unsigned();
            $table->foreign('id_compte')->references('id')->on('comptes');
            $table->string('frais_ouverture');
            $table->string('montant_remuneration');
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
        Schema::dropIfExists('compteepargnes');
    }
}
