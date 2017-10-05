<?php

namespace App\newbles\Entities;

use Illuminate\Database\Eloquent\Model;

class ControlTopeAgua extends Model
{

    protected $table = 'control_tope_agua';
    protected $primaryKey = 'ID_TOPE_AGUA';

    protected $fillable = [
        'ID_DISPOSITIVO',
        'FECHA_REGISTRO',
        'ESTADO_REGISTRO'
    ];

    public $timestamps = false;
}
