<?php

namespace App\Mail;

use App\Models\PedidoInteressado;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioInteressado extends Mailable
{
    use Queueable, SerializesModels;

    private $interessado;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PedidoInteressado $interessado)
    {
        $this->interessado = $interessado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->interessado->prestador->email,'Mestre Obra - '. $this->interessado->prestador->nome)
            ->subject('Prestador interessado!')
            ->cc($this->interessado->prestador->email)
            ->view('mails.pedido.interessado')
            ->with([
                  'nome' => $this->interessado->pedido->nome,
                  'pedido' => $this->interessado->pedido->detalhes ,
                  'prestador' => $this->interessado->prestador->nome,
                  'id' => $this->interessado->prestador->id,
                  'email' => $this->interessado->prestador->email,
                  'telefone' => $this->interessado->prestador->fone,
                  'foto' => $this->interessado->prestador->foto,
                  'mensagem' => $this->interessado->mensagem,
            ]);
    }
}
