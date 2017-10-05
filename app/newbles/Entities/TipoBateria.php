<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoBateria extends Model
{

    protected $table = 'tipo_bateria';
    protected $primaryKey = 'ID_TIPO_BATERIA';

    protected $fillable = [
        'DESCRIPCION',
        'FECHA_COMPRA',
        'FECHA_CADUCIDAD',
        'VOLTAJE_MINIMO',
        'VOLTAJE_MAXIMO',
        'AMPERAJE',
        'USUARIO_CREACION',
        'FECHA_CREACION',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
