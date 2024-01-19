<?php

namespace App\Models;

use App\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preguntas extends Model
{
    
    protected $table='preguntas';
    protected $primaryKey='id';
    public $incrementing=false;
    protected $With=['Category'];
    public $timestamps=false;

    protected $fillable=[
    	'id',
        'pregunta',
        'id_categoria'
    ];
    public function Category(){
        return $this->belongsTo(Category::class, 'id','id');
    }
}
