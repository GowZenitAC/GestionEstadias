<?php

namespace App\Models;

use App\Models\CategoryTSU;
use App\Models\Carreras;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preguntasTSU extends Model
{
    
    protected $table='preguntastsu';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $with=['CategoryTSU','Carreras'];
    public $timestamps=false;

    protected $fillable=[
    	'id',
        'pregunta',
        'imagen_preguntatsu',
        'category_t_s_u_id',
        'carreras_id'
    ];
    public function CategoryTSU(){
        return $this->belongsTo(CategoryTSU::class);    
    }

    public function Carreras(){
        return $this->belongsTo(Carreras::class);
    }

    public function OptionTSU(){
        return $this->hasMany(OpcionesTSU::class, 'pregunta_tsu_id');
    }
}
