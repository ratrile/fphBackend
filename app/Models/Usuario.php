<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    //relacion uno a muchos

    public function medidores(){
    	return $this->hasMany('App\Models\Medidor');
    }
}
