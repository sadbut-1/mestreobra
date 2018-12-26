<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $fillable = [
        'nome', 'descricao','icone','slug','tipo_servico_id'
    ];

    public $timestamps = false;

    public function prestadores()
    {
        return $this->belongsToMany(Prestador::class,'categoria_prestador');
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class,'categoria_especificacao','categoria_id','servico_id');
    }

    public function tipos()
    {
        return $this->belongsToMany(TipoServico::class,'categoria_tipo','categoria_id','tipo_servico_id');
    }

}
