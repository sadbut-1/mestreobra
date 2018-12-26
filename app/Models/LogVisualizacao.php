<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class LogVisualizacao extends Model
{
    protected $table = 'log_visualizacoes';
    /**
     * Esta tabela registra quando um profissional acessou o site para visualizar mais detalhes do pedido.
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

}
