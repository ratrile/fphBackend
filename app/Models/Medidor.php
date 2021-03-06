<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medidor extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'estado',
        'fecha',
        'usuario_id',
    ];

    //relacion uno a muchos inverso
    public function usuario(){
    	return $this->belongsTo('App\Models\Usuario');
    }

    public function medicion(){
    	return $this->hasMany('App\Models\Medicion');
    }
}
