<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class LogEnvioEmail extends Model
{
    protected $table = 'log_envio_emails';
    /**
     * Esta tabela registra todos os emails enviados para avisar os profissionais sobre novos pedidos.
     *
     * @var array
     */
    protected $fillable = [
        'prestador_id', 'pedido_id',
    ];

    public function prestador()
    {
        return $this->belongsTo(Prestador::class,'prestador_id');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'pedido_id');
    }

}
