<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{

    protected $table = 'dispositivo';
    protected $primaryKey = 'ID_DISPOSITIVO';

    protected $fillable = [
        'ID_TIPO_SERVOMOTOR',
        'ID_TIPO_BATERIA',
        'DESCRIPCION',
        'NUMERO_PLACA',
        'VIDA_UTIL_MINIMA',
        'VIDA_UTIL_MAXIMA',
        'USUARIO_CREACION',
        'FECHA_CREACION',
        'USUARIO_MODIFICACION',
        'FECHA_MODIFICACION',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;

    public function atrapanieblas()
    {
        return $this->hasMany(Atrapaniebla::class, 'ID_DISPOSITIVO', 'ID_DISPOSITIVO');
    }

    public function captacionAgua()
    {
        return $this->hasMany(CaptacionAgua::class, 'ID_DISPOSITIVO', 'ID_DISPOSITIVO');
    }

    public function tipoBateria()
    {
        return $this->belongsTo(TipoBateria::class, 'ID_TIPO_BATERIA', 'ID_TIPO_BATERIA');
    }

    public function tipoServomotor()
    {
        return $this->belongsTo(TipoServoMotor::class, 'ID_TIPO_SERVOMOTOR', 'ID_TIPO_SERVOMOTOR');
    }

}
