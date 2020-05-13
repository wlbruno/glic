<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('objetos_id')->unsigned();
            $table->foreign('objetos_id')->references('id')->on('objetos');
            
            $table->bigInteger('fornecedores_id')->unsigned();
            $table->foreign('fornecedores_id')->references('id')->on('fornecedores');

            $table->string('medida');
            $table->integer('quantidade');
            $table->decimal('max');
            $table->decimal('vunitario');
            $table->decimal('vtotal');
            $table->integer('orgao');
            $table->string('marca')->nullable();

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
        Schema::dropIfExists('items');
    }
}
