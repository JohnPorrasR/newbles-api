<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoServoMotor extends Model
{

    protected $table = 'tipo_servomotor';
    protected $primaryKey = 'ID_TIPO_SERVOMOTOR';

    protected $fillable = [
        'DESCRIPCION',
        'CAPACIDAD_MAXIMA',
        'CAPACIDAD_MINIMA',
        'USUARIO_CREACION',
        'FECHA_CREACION',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
