<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $table = 'usuario';
    protected $primaryKey = 'ID_USUARIO';

    protected $fillable = [
        'ID_PERSONA',
        'ID_PREGUNTA',
        'ID_ROL',
        'ALIAS',
        'PASSWORD',
        'RESPUESTA_SECRETA',
        'USUARIO_CREACION',
        'FECHA_CREACION',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
