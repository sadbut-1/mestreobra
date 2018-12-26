<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Landingpage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_page', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('titulo', 120);
            $table->string('url', 250);
            $table->string('descricao', 250);
            $table->longText('texto_completo')->nullable();
            $table->integer('tipo_servico_id')->nullable();
            $table->integer('categoria_id')->nullable();
            $table->integer('servico_id')->nullable();
            $table->tinyInteger('publicada')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
