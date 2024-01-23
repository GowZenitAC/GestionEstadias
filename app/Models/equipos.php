<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    protected $table = 'equipos';
    protected $primarykey='id_equipo';
    public $incrementing= true;
    public $timestamps = false;
     
    protected $fillable=[
    'id_equipo',
    'nombre',
    'puntuacion',
    'tiempo'
    ];

}
