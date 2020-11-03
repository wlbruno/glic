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
            //SALDO DO ITEM 
            $table->string('quantidadeSES'); // quantidade solicitada pela sesPE
            $table->string('BKsaldo');   //Backup saldo do item 
            //ORGAO NAO PARTICIPANTE
            $table->string('quantidadeONP'); //Valor órgão não participantes
            $table->string('saldoONP'); //Saldo do item parar o orgao nao participante, esse saldo vai diminundo conforme for acontecendo licitação.
            //ORGAO PARTICIPANTE
            $table->string('quantidadeOP'); // quantidade para o orgao participante
            $table->string('saldoOP'); //Saldo do item parar o orgao participante, esse saldo vai diminundo conforme for acontecendo licitação.
            //
            $table->string('vunitario'); //Valor unitario desse item 
            $table->string('vtotal'); //valor total desse item 
            $table->string('medida'); // unidade de medida
            $table->string('marca')->nullable(); // marca do item, tem alguns itens que nao tem marca

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
        Schema::dropIfExists('itens');
    }
}
