<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class Atrapaniebla extends Model
{

    protected $table = 'atrapanieblas';
    protected $primaryKey = 'ID_ATRAPANIEBLAS';

    protected $fillable = [
        'ID_DISPOSITIVO',
        'ID_TIPO_TANQUE',
        'ID_TIPO_DISENIO',
        'ID_TIPO_MALLA',
        'ID_ESTADO_ATRAPANIEBLAS',
        'ANCHO',
        'ALTO',
        'LONGITUD',
        'LATITUD',
        'FECHA_VIGENCIA',
        'HUMEDAD_PROMEDIO',
        'OBSERVACION',
        'USUARIO_CREACION',
        'FECHA_CREACION',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;

    public function fotoAtrapanieblas()
    {
        return $this->hasMany(FotoAtrapaniebla::class, 'ID_ATRAPANIEBLAS', 'ID_ATRAPANIEBLAS');
    }

}
