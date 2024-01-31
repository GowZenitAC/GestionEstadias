<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class OpcionesTSU extends Model
{
    protected $table='opcionestsu';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $with=['PreguntasTSU'];
    public $timestamps=false;

    protected $fillable=[
    	'id',
        'optiontsu',
        'puntostsu',
        'pregunta_tsu_id',
    ];

    public function PreguntasTSU(){
        return $this->belongsTo(PreguntasTSU::class, 'pregunta_tsu_id');
    }
    

}
