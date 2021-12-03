<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuboCosto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cantidadMinimaCubo',
        'costoMinimoConsumo',
        'costoCuboAdicional',
        'activo',
        'detalle'
    ];
}
