<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    protected $fillable = [
        'acao','descricao','ip_server',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
