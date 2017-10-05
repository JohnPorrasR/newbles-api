<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class AperturaValvula extends Model
{

    protected $table = 'apertura_valvula';
    protected $primaryKey = 'ID_APERTURA_VALVULA';

    protected $fillable = [
        'ID_DISPOSITIVO',
        'FECHA_REGISTRO',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;

}
