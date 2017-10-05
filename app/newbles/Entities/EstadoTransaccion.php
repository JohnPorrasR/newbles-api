<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class EstadoTransaccion extends Model
{

    protected $table = 'estado_transaccion';
    protected $primaryKey = 'ID_ESTADO_TRANSACCION';

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
