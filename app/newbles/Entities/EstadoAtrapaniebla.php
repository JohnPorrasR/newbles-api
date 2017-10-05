<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class EstadoAtrapaniebla extends Model
{

    protected $table = 'estado_atrapanieblas';
    protected $primaryKey = 'ID_ESTADO_ATRAPANIEBLAS';

    protected $fillable = [
        'DESCRIPCION',
        'USUARIO_REGISTRO',
        'FECHA_REGISTRO',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
