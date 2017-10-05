<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class CierreValvula extends Model
{

    protected $table = 'cierre_valvula';
    protected $primaryKey = 'ID_CIERRE_VALVULA';

    protected $fillable = [
        'ID_DISPOSITIVO',
        'FECHA_REGISTRO',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
