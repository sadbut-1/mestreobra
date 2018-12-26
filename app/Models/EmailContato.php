<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailContato extends Model
{
    protected $table = 'email_contatos';
    /**
     * Esta tabela registra todas as entradas do profissionais na plataforma. É possível ver a contagem de acesso
     * na página administrativa no menu usuários.
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'assunto',
        'mensagem'
    ];
}
