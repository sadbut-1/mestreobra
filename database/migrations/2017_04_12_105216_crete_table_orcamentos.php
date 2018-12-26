<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteTableOrcamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id');
            $table->integer('prestador_id');
            $table->integer('validade')->default(0)->nullable();
            $table->decimal('subtotal')->default(0)->nullable();
            $table->decimal('desconto')->default(0)->nullable();
            $table->decimal('total');
            $table->string('condicoes_pagamento')->nullable();
            $table->text('detalhes');
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
        Schema::dropIfExists('orcamentos');
    }
}
