<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CategoryTSU extends Model
{
    protected $table='categoriestsu';
    protected $primaryKey='id';
    public $incrementing=true;

    public $timestamps=false;

    protected $fillable=[
    	'id',
        'nametsu'
    ];

    // public function preguntas(){
    //     return $this->hasMany(preguntas::class);

    // }
    

}