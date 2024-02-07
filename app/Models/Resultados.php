<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Resultados extends Model
{
    protected $table='resultados';
    protected $primaryKey='id';
    public $incrementing=true;

    public $timestamps=false;

    protected $fillable=[
    	'id',
        'id_equipo',
        'puntos',
        'tiempo'
    ];
    

}
