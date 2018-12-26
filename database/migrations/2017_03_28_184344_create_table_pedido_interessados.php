<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePedidoInteressados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_interessados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id');
            $table->integer('prestador_id');
            $table->integer('interesse');
            $table->string('contato')->default('telefone');
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
        Schema::dropIfExists('pedido_interessados');
    }
}
