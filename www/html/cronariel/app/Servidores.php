<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidores extends Model
{
    protected $fillable = [
        'ip', 'so',
    ];
}
