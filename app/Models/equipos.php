<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $table='equipos';
    protected $primarykey='id';
    public $incrementingin=true;
    
    public $timestamps=false;

    protected $fillable=[
        'id',
        'nombre',
      
    ];

    public function resultados(){
        return $this->hasOne(Resultados::class);
    }

}
