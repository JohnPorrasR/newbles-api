<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoTanque extends Model
{

    protected $table = 'tipo_tanque';
    protected $primaryKey = 'ID_TIPO_TANQUE';

    protected $fillable = [
        'DESCRIPCION',
        'CAPACIDAD_MINIMA',
        'CAPACIDAD_MAXIMA',
        'USUARIO_CREACION',
        'FECHA_CREACION',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
