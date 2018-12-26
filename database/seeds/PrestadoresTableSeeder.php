<?php

use Illuminate\Database\Seeder;

class PrestadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prestadores')->insert([
            'nome' => 'Mestre Obra',
            'assinatura' => 'Solicite orçamentos',
            'email' => 'contato@mestreobra.com.br',
            'fone' => '42 3333 4444',
            'cep' => '84010660',
            'detalhes' => 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate.',
            'foto' => 'prestadores/fc13eef08a7e61958fbb928c9b63bb4c.jpeg',
        ]);

        DB::table('categoria_prestador')->insert([
            'categoria_id' => 4,
            'prestador_id' => 1
        ]);

    }
}