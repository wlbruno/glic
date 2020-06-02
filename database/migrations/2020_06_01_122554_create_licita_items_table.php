<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicitaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licita_items', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('licitas_id');
            $table->unsignedBigInteger('itens_id');
            $table->bigInteger('quantidade');
            
            $table->foreign('itens_id')
            ->references('id')
            ->on('itens');

            $table->foreign('licitas_id')
                        ->references('id')
                        ->on('licitas')
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
        Schema::dropIfExists('licita_items');
    }
}
