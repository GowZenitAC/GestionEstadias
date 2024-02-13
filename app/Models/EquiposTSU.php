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

    protected $fillable=[
        'id',
        'nombretsu',
      
    ];

    public function resultadostsu(){
        return $this->hasOne(ResultadosTSU::class);
    }

}
