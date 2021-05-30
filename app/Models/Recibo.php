<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fechaEmision',
        'total',
        'medicion_id',
    ];

    public function medicion(){
        return $this->hasOne('App\Models\Medicion');
    }
}
