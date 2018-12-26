<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('icone');
            $table->text('descricao');
        });


        DB::table('categorias')->insert([
            [
                'nome' => 'Elaboração de Projetos',
                'descricao' => '...',
                'icone' => 'fa flaticon-paper'
            ],
            [
                'nome' => 'Execução da Obra',
                'descricao' => 'Tubulação, manutenção ...',
                'icone' => 'fa flaticon-brick-wall'
            ],
            [
                'nome' => 'Reformas e Obras Menores',
                'descricao' => 'Texturas, fachadas ...',
                'icone' => 'fa flaticon-home-1'
            ],
            [
                'name' => 'Manutenção e Reparos',
                'descricao' => 'Reparos ...',
                'icone' => 'fa flaticon-repair-tools-cross'
            ],
            [
                'nome' => 'Acabamento e Pintura',
                'descricao' => 'Construção ...',
                'icone' => 'fa flaticon-paint'
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
        Schema::dropIfExists('categorias');
    }
}
