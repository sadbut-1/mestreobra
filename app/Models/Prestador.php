<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{

    protected $table = 'prestadores';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id',
        'detalhes',
        'nome',
        'assinatura',
        'email',
        'fone',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'complemento',
        'foto',
        'cnpj',
        'facebook',
        'indicacoes',
        'experiencia',
        'slug'
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class,'usuario_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class,'categoria_prestador');
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class,'prestador_servico');
    }

    public function pedido()
    {
        return $this->belongsToMany(Pedido::class,'pedido_prestador');
    }

    public function fotos()
    {
        return $this->hasMany(PrestadorFoto::class,'prestador_id');
    }

    public function orcamentos_recebidos()
    {
        return $this->hasMany(LogEnvioEmail::class,'prestador_id');
    }

    public function agendados()
    {
        return $this->hasMany(AgendaCliente::class);
    }

    public function tipos()
    {
        return $this->belongsToMany(TipoServico::class,'prestador_tipo','prestador_id','tipo_servico_id');
    }

    public function interesses()
    {
        return $this->hasMany(PedidoInteressado::class,'prestador_id');
    }

    public function mensagens()
    {
        return $this->hasMany(PedidoMensagem::class,'prestador_id');
    }

    public function boletos()
    {
        return $this->hasMany(Boleto::class,'prestador_id');
    }
}
