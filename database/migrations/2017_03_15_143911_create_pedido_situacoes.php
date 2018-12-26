<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoSituacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_situacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id');
            $table->integer('prestador_id')->nullable();
            $table->integer('situacao');
            $table->string('nome');
            $table->text('comentario')->nullable();
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
        Schema::dropIfExists('pedido_situacoes');
    }
}
