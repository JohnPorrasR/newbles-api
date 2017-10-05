<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class CaptacionEstimada extends Model
{

    protected $table = 'captacion_estimada';
    protected $primaryKey = 'ID_CAPTACION_ESTIMADA';

    protected $fillable = [
        'ID_TIPO_MALLA',
        'LITRO_CAPTACION_METRO_C',
        'USUARIO_CREACION',
        'FECHA_CREACION',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
