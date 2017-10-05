<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class FotoAtrapaniebla extends Model
{

    protected $table = 'foto_atrapanieblas';
    protected $primaryKey = 'ID_FOTO_ATRAPANIEBLAS';

    protected $fillable = [
        'ID_ATRAPANIEBLAS',
        'FOTO_RUTA',
        'USUARIO_REGISTRO',
        'FECHA_REGISTRO',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
