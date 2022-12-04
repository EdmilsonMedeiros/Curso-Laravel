<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filial');
            $table->timestamps();
        });
        //cria colunas da tabela produto_filiais:
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda');
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
        //remove colunas da tabela produto:
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adiciona colunas da tabela produto:
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('preco_venda');
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
};
