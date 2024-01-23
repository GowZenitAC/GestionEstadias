<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preguntas extends Model
{
    
    protected $table='preguntas';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $with=['Category'];
    public $timestamps=false;

    protected $fillable=[
    	'id',
        'pregunta',
        'category_id'
    ];
    public function Category(){
        return $this->belongsTo(Category::class);    
    }
}
