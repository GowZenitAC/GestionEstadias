<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Opciones extends Model
{
    protected $table='options';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $with=['preguntas'];
    public $timestamps=false;

    protected $fillable=[
    	'id',
        'option',
        'points',
        'preguntas_id'
    ];

    public function preguntas(){
        return $this->belongsTo(preguntas::class);
    }
    

}
