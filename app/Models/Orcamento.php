<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Orcamento extends Model
{
    protected $table ='orcamentos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pedido_id',
        'prestador_id',
        'validade',
        'subtotal',
        'desconto',
        'total',
        'condicoes_pagamento',
        'detalhes',
        'arquivo'
    ];

    public function prestador()
    {
        return $this->belongsTo(Prestador::class,'prestador_id');
    }
}
