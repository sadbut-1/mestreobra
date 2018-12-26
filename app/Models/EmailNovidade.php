<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailNovidade extends Model
{
    protected $table = 'email_novidades';
    /**
     * Esta tabela registra todas as entradas do profissionais na plataforma. É possível ver a contagem de acesso
     * na página administrativa no menu usuários.
     * @var array
     */
    protected $fillable = [
        'email',
    ];
}
