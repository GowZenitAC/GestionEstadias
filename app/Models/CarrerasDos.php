<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CarrerasDos extends Model
{
    protected $table='carreras2';
    protected $primaryKey='id';
    public $incrementing=true;

    public $timestamps=false;

    protected $fillable=[
    	'id',
        'carrera2'
    ];

    public function equipostsu(){
        return $this->hasOne(EquiposTSU::class);
    }

}
