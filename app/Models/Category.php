<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table='categories';
    protected $primaryKey='id';
    protected $with=['preguntas'];
    public $incrementing=true;

    public $timestamps=false;

    protected $fillable=[
    	'id',
        'name'
    ];

    public function preguntas(){
        return $this->hasMany(preguntas::class,'id','id');

    }
    

}
