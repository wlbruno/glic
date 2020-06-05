<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaronasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('caronas', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            // $table->string('status');

            
            $table->date('validade');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('atas_id');
            $table->foreign('atas_id')->references('id')->on('atas');

            // $table->bigInteger('lotes_id')->unsigned();
            // $table->foreign('lotes_id')->references('id')->on('lotes');

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
        Schema::dropIfExists('caronas');
    }
}

