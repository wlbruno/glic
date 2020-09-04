<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('atas_id')->unsigned();
            $table->foreign('atas_id')->references('id')->on('atas')->onDelete('cascade');;

            $table->unsignedBigInteger('itens_id');
            $table->foreign('itens_id')->references('id')->on('itens')->onDelete('cascade');;

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');;

            $table->string('saldo');

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
        Schema::dropIfExists('orgaos');
    }
}
