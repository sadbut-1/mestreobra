<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class NovoUsuario extends Mailable
{
    use Queueable, SerializesModels;

    private $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $usuario, $pass)
    {
        $this->usuario = $usuario;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contato@mestreobra.com.br','Mestre Obra')
            ->subject('Bem vindo ao Mestre Obra!')->view('mails.novo-usuario')
            ->bcc('contatomestreobra@gmail.com')
            ->with([
                  'nome' => $this->usuario->name,
                  'email' => $this->usuario->email,
                  'senha' => $this->pass,
            ]);
    }
}
