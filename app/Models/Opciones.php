<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Opciones extends Model
{
    protected $table='opciones';
    protected $primaryKey='id';
    public $incrementing=true;

    public $timestamps=false;

    protected $fillable=[
    	'id',
        'opciones',
        'puntos'
    ];
    

}
