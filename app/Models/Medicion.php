<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lecturaAnt',
        'lecturaAct',
        'fechaMedicion',
        'consumo',
        'pagado',
        'total',
        'medidor_id',
    ];

    public function Medidor(){
    	return $this->belongsTo('App\Models\Medidor');
    }
}
