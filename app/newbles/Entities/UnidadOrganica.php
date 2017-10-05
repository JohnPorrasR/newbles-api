<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class UnidadOrganica extends Model
{

    protected $table = 'unidad_organica';
    protected $primaryKey = 'ID_UNIDAD_ORGANICA';

    protected $fillable = [
        'DESCRIPCION',
        'USUARIO_CREACION',
        'FECHA_CREACION',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
