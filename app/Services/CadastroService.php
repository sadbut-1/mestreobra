<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 24/04/2017
 * Time: 10:04
 */

namespace App\Services;

use App\Models\User;
use App\Models\Cliente;
use App\Mail\NovoCliente;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class CadastroService
{

    public function __construct(User $user, Cliente $cliente)
    {
        $this->user = $user;
        $this->cliente = $cliente;
    }

    public function novo($pedido,$role)
    {
        $user = $this->user->where('email',$pedido->email)->first();
        if(!$user) {
            //Cadastra usuario
            $pass = str_random(6);
            $user = $this->user->create([
                'name' => $pedido->nome,
                'email' => $pedido->email,
                'password' => Hash::make($pass),
                'role' => $role,
            ]);
            //Cadastra dados de cliente do usuario
            $this->novoCliente($user,$pedido);
            //Enviar email com user e senha para acompanhr pedido
            Mail::to($pedido->email)->send(new NovoCliente($user,$pass));
        } else {
            $cliente = $this->cliente->where('usuario_id', $user->id)->first();
            if(!$cliente){
                $this->novoCliente($user,$pedido);
            }
        }
    }

    public function novoCliente($user,$pedido)
    {
        $this->cliente->create([
            'usuario_id' => $user->id,
            'cep' => $pedido->cep,
            'estado' => $pedido->estado,
            'cidade' => $pedido->cidade,
            'bairro' => $pedido->bairro,
            'numero' => 0,
            'rua' => $pedido->rua,
            'celular' =>$pedido->celular,
            'telefone' => $pedido->fone
        ]);

    }
}