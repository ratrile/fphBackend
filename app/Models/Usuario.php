<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'ci',
        'direccion',
        'detalle',
    ];
    //relacion uno a muchos

    public function medidores(){
    	return $this->hasMany('App\Models\Medidor');
    }
}
