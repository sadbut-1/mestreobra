<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePrestadorQualificacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestador_qualificacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prestador_id')->unsigned();
            $table->string('qualificacao')->nullable();
            $table->boolean('padrao')->default(1);
            $table->string('detalhes')->nullable();
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
        Schema::dropIfExists('prestador_qualificacoes');
    }
}
