<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptecourantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptecourants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_compte')->unsigned();
            $table->foreign('id_compte')->references('id')->on('comptes');
            $table->string('agios');
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
        Schema::dropIfExists('comptecourants');
    }
}
