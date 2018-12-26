<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParceiroConfig extends Model
{
    protected $table = 'parceiros_config';

    protected $fillable = [
        'mostrar',
    ];

}
