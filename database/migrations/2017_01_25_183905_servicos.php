<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });

        DB::table('servicos')->insert([
            [
                'categoria_id' => 1,
                'nome' => 'Fazer instalação elétrica obra nova',
                'descricao' => 'Interruptores, luminárias ...',
            ],
            [
                'categoria_id' => 1,
                'nome' => 'Reformar instalação elétrica geral',
                'descricao' => 'Interruptores, luminárias ...',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
}
