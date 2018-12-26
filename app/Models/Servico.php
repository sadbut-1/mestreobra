<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'servicos';

    protected $fillable = [
        'categoria_id','nome', 'descricao','ordem'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class,'categoria_especificacao','servico_id','categoria_id');
    }

    public function prestadores()
    {
        return $this->belongsToMany(Prestador::class,'prestador_servico');
    }

}
