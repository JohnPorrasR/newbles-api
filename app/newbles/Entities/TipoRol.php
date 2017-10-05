<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoRol extends Model
{

    protected $table = 'tipo_rol';
    protected $primaryKey = 'ID_ROL';

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
