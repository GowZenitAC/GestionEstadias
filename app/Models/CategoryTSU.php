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

    public function preguntasTSU(){
        return $this->hasMany(preguntasTSU::class);

    }
    

}