<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class PreguntaSecreta extends Model
{

    protected $table = 'pregunta_secreta';
    protected $primaryKey = 'ID_PREGUNTA_SECRETA';

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
