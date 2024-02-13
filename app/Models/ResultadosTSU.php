<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ResultadosTSU extends Model
{
    protected $table='resultadostsu';
    protected $primaryKey='id';
    public $incrementing=true;
    public $with=['equipotsu'];

    public $timestamps=false;

    protected $fillable=[
    	'id',
        'id_equipotsu',
        'puntostsu',
        'tiempotsu'
    ];

    public function equipotsu(){

        return $this->belongsTo(EquiposTSU::class, 'id_equipotsu');
    }
    

}
