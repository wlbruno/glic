<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitas', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('user_id');
            $table->bigInteger('atas_id')->unsigned();
            
            $table->foreign('atas_id')
            ->references('id')
            ->on('atas');

              $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');
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
        Schema::dropIfExists('licitas');
    }
}
