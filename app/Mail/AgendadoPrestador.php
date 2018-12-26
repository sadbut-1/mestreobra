<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Pedido;
use App\Models\Prestador;
use App\Models\AgendaCliente;

class AgendadoPrestador extends Mailable
{
    use Queueable, SerializesModels;

    private $pedido;
    private $agenda;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido, AgendaCliente $agenda)
    {
        $this->pedido = $pedido;
        $this->agenda = $agenda;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contato@mestreobra.com.br','Mestre Obra')
            ->subject('Visita agendada')->view('mails.visita-agendada')
            ->with([
                'nome' => $this->pedido->nome,
                'detalhes' => $this->pedido->detalhes,
                'data' => $this->agenda->data,
                'hora' => $this->agenda->hora,
                'local' => $this->agenda->local
            ]);
    }
}
