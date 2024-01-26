<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class OpcionesTSU extends Model
{
    protected $table='opcionestsu';
    protected $primaryKey='id';
    public $incrementing=true;

    public $timestamps=false;

    protected $fillable=[
    	'id',
        'optiontsu',
        'puntostsu',
    ];
    

}
