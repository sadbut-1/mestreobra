<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoServico extends Model
{

    protected $table = 'tipo_servicos';

    protected $fillable = [
        'nome', 'descricao','slug'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class,'categoria_tipo');
    }
}
