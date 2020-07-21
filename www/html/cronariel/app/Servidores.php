<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidores extends Model
{
    protected $fillable = [
        'ip', 'so',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        // your other new column
    ];


/*public function getJob(){

    return $this->belongsToMany('App\Job', 'job')
}
*/


}
