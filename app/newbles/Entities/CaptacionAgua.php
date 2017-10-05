<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class CaptacionAgua extends Model
{

    protected $table = 'captacion_agua';
    protected $primaryKey = 'ID_CAPTACION_AGUA';

    protected $fillable = [
        'ID_DISPOSITIVO',
        'ID_ESTADO_TRANSACCION',
        'CANTIDAD_CAPTADA',
        'FECHA_REGISTRO',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
