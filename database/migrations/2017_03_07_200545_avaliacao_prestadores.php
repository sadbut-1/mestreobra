<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvaliacaoPrestadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_prestadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id');
            $table->integer('estrelas');
            $table->text('comentario')->nullable();
            $table->boolean('anonimo')->default(0);
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
        Schema::dropIfExists('avaliacao_prestadores');
    }
}
