<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 30/05/2017
 * Time: 09:16
 */

namespace App\Services;

use App\Models\Prestador;
use App\Models\Boleto;
use Carbon\Carbon;
use GuzzleHttp\Client;

class CobrancaService
{

    private $boleto;
    private $prestador;

    public function __construct(Prestador $prestador, Boleto $boleto)
    {
        $this->prestador = $prestador;
        $this->boleto = $boleto;
    }

    public function calcula($mes)
    {
        $inicio = env('INICIO_COBRANCA');
        $diaVencimento = 10;
        $boleto = [];
        $total = 0;
        $valores = [
            '0' => 30,
            '1' => 30,
            '2' => 30,
            '3' => 30,
            '4' => 50,
            '5' => 50,
            '6' => 70,
            '7' => 70,
            '8' => 90,
            '9' => 90,
            '10' =>100
        ];

        //$prestadores =  $this->prestador->where('cobranca_ativa',1)
        $prestadores =  $this->prestador->where('ativo',1)
            ->withCount(['interesses' => function($q) use($mes){
                $q->whereMonth('created_at','=',$mes);
        }])->get();

        foreach ($prestadores as $i=>$prestador)
        {
            $boleto['prestador_id'] = $prestador->id;
            //$boleto[$i]['nome'] = $prestador->nome;
            $boleto['interesses'] = $prestador->interesses_count;
            $boleto['data'] = Carbon::now()->year.'-'.$mes.'-'.$diaVencimento;
            if($prestador->interesses_count < 10 ) {
                $boleto['valor'] = $valores[$prestador->interesses_count];
                $total += $valores[$prestador->interesses_count];
            } else {
                $boleto['valor'] = $valores[10];
                $total += $valores[10];
            }

            $this->boleto->create($boleto);
        }

        return ['message' => 'Boletos criados com sucesso!'];
    }

    public function emitir($mes)
    {
        $client = new Client();
        $boletos = $this->boleto->whereMonth('data',$mes)->get();

        foreach ($boletos as $boleto)
        {
//            $response = $client->post('http://api-mestreobra.local/cobranca',
//                ['json' =>
//                    [
//                        'name' => 'Mensalidade Mestre Obra',
//                        'amount' => 1,
//                        'value' => $boleto->valor
//                    ]
//                ]);
//
//            $charge_id = $response->getBody()->getContents();

            $charge_id = '230849';
            $response2 = $client->post('http://api-mestreobra.local/boleto',
                ['json' =>
                    [
                        'charge_id' => $charge_id,
                        'corporate_name' => 'Mestre Obra', // nome da razão social
                        'cnpj' => '99794567000144', // CNPJ da empresa, com 14 caracteres

                        'name' => $boleto->prestador->nome, // nome do cliente
                        'cpf' => '03802129946',//$boleto->prestador->cnpj, // cpf do cliente
                        'phone_number' => $boleto->prestador->fone, // telefone do cliente

                        'expire_at' => '2017-06-17'//$boleto->data,
                    ]
                ]);

            $result = $response2->getBody()->getContents();

            return ['mensagem' => $result];
        }
    }
}