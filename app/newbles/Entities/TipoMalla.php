<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoMalla extends Model
{

    protected $table = 'tipo_malla';
    protected $primaryKey = 'ID_TIPO_MALLA';

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
