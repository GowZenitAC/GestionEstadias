<?php

namespace App;

use App\Models\preguntas;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table='categories';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $with=['preguntas'];
    public $timestamps=false;

    protected $fillable=[
    	'id',
        'name'
    ];

    public function preguntas(){
        return $this -> hasMany(preguntas::class,'id','id');
    }
}
