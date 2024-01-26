<?php

namespace App\Models;

use App\Models\CategoryTSU;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preguntasTSU extends Model
{
    
    protected $table='preguntastsu';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $with=['CategoryTSU'];
    public $timestamps=false;

    protected $fillable=[
    	'id',
        'preguntatsu',
        'imagen_preguntatsu',
        'category_t_s_u_id',
    ];
    public function CategoryTSU(){
        return $this->belongsTo(CategoryTSU::class);    
    }
}
