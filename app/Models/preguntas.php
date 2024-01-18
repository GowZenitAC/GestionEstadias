<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preguntas extends Model
{
    
    protected $table='preguntas';
    protected $primaryKey='id';
    public $incrementing=false;

    public $timestamps=false;

    protected $fillable=[
    	'id',
        'pregunta',
        'id_categorias'
    ];
}
