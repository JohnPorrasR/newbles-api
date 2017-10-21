<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $table = 'persona';
    protected $primaryKey = 'ID_PERSONA';

    protected $fillable = [
        'ID_UNIDAD_ORGANICA',
        'DNI',
        'NOMBRES',
        'APELLIDO_PATERNO',
        'APELLIDO_MATERNO',
        'USUARIO_CREACION',
        'FECHA_CREACION',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO',
        'CORREO'
    ];

    public $timestamps = false;
}
