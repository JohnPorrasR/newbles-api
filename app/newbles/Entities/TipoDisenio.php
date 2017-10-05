<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoDisenio extends Model
{

    protected $table = 'tipo_disenio';
    protected $primaryKey = 'ID_TIPO_DISENIO';

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
