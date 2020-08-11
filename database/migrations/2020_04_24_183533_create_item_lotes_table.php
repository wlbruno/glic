<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_lotes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('itens_id');
            $table->foreign('itens_id')->references('id')->on('itens')->onDelete('cascade');
            
            $table->unsignedBigInteger('lotes_id');
            $table->foreign('lotes_id')->references('id')->on('lotes')->onDelete('cascade');
            
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
        Schema::dropIfExists('item_lotes');
    }
}
