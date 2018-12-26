<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();
            $table->timestamps();
        });

        DB::table('tipo_servicos')->insert([
            [
                'nome' => 'Arquiteto',
                'descricao' => '...',
            ],
            [
                'nome' => 'Engenheiro',
                'descricao' => 'Tubulação, manutenção ...',
            ],
            [
                'nome' => 'Designer',
                'descricao' => 'Texturas, fachadas ...',
            ],
            [
                'name' => 'Eletricista',
                'descricao' => 'Reparos ...',
            ],
            [
                'nome' => 'Encanador',
                'descricao' => 'Construção ...'
            ],
            [
                'nome' => 'Gesseiro/Drywall',
                'descricao' => 'Construção ...'
            ],
            [
                'nome' => 'Pedreiro',
                'descricao' => 'Construção ...'
            ],
            [
                'nome' => 'Pintor',
                'descricao' => 'Construção ...'
            ],
            [
                'nome' => 'Segurança Eletrônica',
                'descricao' => 'Construção ...'
            ],
            [
                'nome' => 'Serralheiro',
                'descricao' => 'Construção ...'
            ],
            [
                'nome' => 'Vidraceiro',
                'descricao' => 'Construção ...'
            ],
            [
                'nome' => 'Empresa',
                'descricao' => 'Construção ...'
            ],
            [
                'nome' => 'Marido de aluguel',
                'descricao' => 'Construção ...'
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
        Schema::dropIfExists('tipo_servicos');
    }
}
