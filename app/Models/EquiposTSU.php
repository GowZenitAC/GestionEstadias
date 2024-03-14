<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquiposTSU extends Model
{
    protected $table='equipostsu';
    protected $primarykey='id';
    public $incrementingin=true;
    
    public $timestamps=false;
    protected $with=['carreras'];
    protected $fillable=[
        'id',
        'nombretsu',
        'id_carrera'
    ];

    public function resultadostsu(){
        return $this->hasOne(ResultadosTSU::class);
    }
    public function carreras(){
        return $this->belongsTo(CarrerasDos::class, 'id_carrera');
    }
}
