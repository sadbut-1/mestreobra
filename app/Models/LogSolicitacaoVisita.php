<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class LogSolicitacaoVisita extends Model
{
    protected $table = 'log_solicitacao_visitas';
    /**
     * Esta tabela registra quando um prestaador solicita visita ao cliente.
     *
     * @var array
     */
    protected $fillable = [
        'prestador_id', 'pedido_id',
    ];

    public function prestador()
    {
        return $this->hasOne(Prestador::class,'prestador_id');
    }

}
