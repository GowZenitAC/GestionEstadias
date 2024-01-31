<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Carreras extends Model
{
    protected $table='carreras';
    protected $primaryKey='id';
    public $incrementing=true;

    public $timestamps=false;

    protected $fillable=[
    	'id',
        'carrera'
    ];
    

}
