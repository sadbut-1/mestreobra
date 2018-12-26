<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_servico_id',
        'categoria_id',
        'servico_id',
        'detalhes',
        'urgencia',
        'nome',
        'email',
        'fone',
        'celular',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'complemento',
        'preferencia_contato',
        'ativo',
        'hash',
        'cc',
        'limite',
        'pagina',
        'conheceu_por',
        'cliente_id',
        'pal_chave'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class,'servico_id');
    }

    public function fotos()
    {
        return $this->hasMany(PedidoFoto::class);
    }

    public function visitas()
    {
        return $this->hasMany(LogVisualizacao::class);
    }

    public function envios()
    {
        return $this->hasMany(LogEnvioEmail::class);
    }

    public function enviosSituacao()
    {
        return $this->hasMany(LogEmailSituacaoPedido::class);
    }

    public function enviosAvaliacao()
    {
        return $this->hasMany(LogEmailAvaliacao::class);
    }

    public function prestador()
    {
        return $this->belongsToMany(Prestador::class,'pedido_prestador');
    }

    public function situacao()
    {
        return $this->hasMany(PedidoSituacao::class,'pedido_id');
    }

    public function avaliacao()
    {
        return $this->hasMany(AvaliacaoPrestador::class,'pedido_id');
    }

    public function agendados()
    {
        return $this->hasMany(AgendaCliente::class,'pedido_id');
    }

    public function interessados()
    {
        return $this->hasMany(PedidoInteressado::class,'pedido_id');
    }

    public function orcamentos()
    {
        return $this->hasMany(Orcamento::class,'pedido_id');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoServico::class,'tipo_servico_id');
    }

    public function prestadorVerificado()
    {
        return $this->hasMany(PrestadorContatoVerificado::class,'pedido_id');
    }

}
