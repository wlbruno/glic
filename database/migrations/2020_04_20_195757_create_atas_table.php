<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atas', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('departamento');
            $table->string('descricao');
            $table->string('nata')->unique();
            $table->string('npregao')->unique();
            $table->string('nprocesso')->unique();
            $table->string('vigencia');
            $table->string('tipo');
            $table->string('comissao');
            $table->string('status');
            $table->string('orgao');
            $table->string('arquivo');

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
        Schema::dropIfExists('atas');
    }
}