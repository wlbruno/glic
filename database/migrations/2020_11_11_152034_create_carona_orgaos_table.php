<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaronaOrgaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carona_orgaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quantidade');
            
            $table->bigInteger('caronas_id')->unsigned();
            $table->foreign('caronas_id')->references('id')->on('caronas')->onDelete('cascade');

            $table->bigInteger('itens_id')->unsigned();
            $table->foreign('itens_id')->references('id')->on('itens')->onDelete('cascade');

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
        Schema::dropIfExists('carona_orgaos');
    }
}
