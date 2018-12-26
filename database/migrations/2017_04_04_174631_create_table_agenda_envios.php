<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAgendaEnvios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_envios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('envio_situacao')->default(5);
            $table->integer('reenvio_situacao')->default(15);
            $table->integer('envio_avaliacao_prestador')->default(15);
            $table->integer('reenvio_avaliacao_prestador')->default(15);
            $table->integer('envio_avaliacao_mo')->default(25);
            $table->integer('reenvio_avaliacao_mo')->default(25);
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
        Schema::dropIfExists('agenda_envios');
    }
}
