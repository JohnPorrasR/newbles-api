<?php
/**
 * Created by PhpStorm.
 * User: JohnVladimir
 * Date: 23/09/2017
 * Time: 15:14
 */

namespace App\newbles\Repositories;


use App\newbles\Entities\EstadoAtrapaniebla;
use App\newbles\Entities\EstadoTransaccion;

class EstadoTransaccionRepo
{

    public function listarEstadoTransaccion()
    {
        $datos = EstadoTransaccion::where('ESTADO_REGISTRO', 'A')->get();
        return $datos;
    }

    public function listarUnaEstadoTransaccion($cod)
    {
        $datos = EstadoTransaccion::where('ESTADO_REGISTRO', 'A')->where('ID_ATRAPANIEBLAS', $cod)->get();
        return $datos;
    }

    public function insertarEstadoTransaccion($inputs)
    {
        $datos = EstadoTransaccion::create($inputs);
        return $datos;
    }

    public function actualizarEstadoTransaccion($inputs, $id)
    {
        $datos = EstadoTransaccion::findOrFail($id);
        $datos->fill($inputs);
        $datos->save();
        return $datos;
    }

}