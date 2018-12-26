<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaEnvio extends Model
{
    protected $table = 'agenda_envios';
    /**
     * Esta tabela registra todas as entradas do profissionais na plataforma. É possível ver a contagem de acesso
     * na página administrativa no menu usuários.
     * @var array
     */
    protected $fillable = [
        'envio_situacao',
        'reenvio_situacao',
        'envio_avaliacao_prestador',
        'reenvio_avaliacao_prestador',
        'envio_avaliacao_mo',
        'reenvio_avaliacao_mo'
    ];

}
