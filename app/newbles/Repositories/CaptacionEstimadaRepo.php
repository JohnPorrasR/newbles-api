<?php
/**
 * Created by PhpStorm.
 * User: JohnVladimir
 * Date: 23/09/2017
 * Time: 15:15
 */

namespace App\newbles\Repositories;


use App\newbles\Entities\CaptacionAgua;
use App\newbles\Entities\CaptacionEstimada;

class CaptacionEstimadaRepo
{

    public function listarCaptacionEstimada()
    {
        $datos = CaptacionEstimada::where('ESTADO_REGISTRO', 'A')->get();
        return $datos;
    }

    public function consultarCaptacionEstimada($cod)
    {
        $datos = CaptacionEstimada::where('ESTADO_REGISTRO', 'A')->where('ID_ATRAPANIEBLAS', $cod)->get();
        return $datos;
    }

    public function insertarCaptacionEstimada($inputs)
    {
        $datos = CaptacionEstimada::create($inputs);
        return $datos;
    }

    public function actualizarCaptacionEstimada($inputs, $id)
    {
        $datos = CaptacionEstimada::findOrFail($id);
        $datos->fill($inputs);
        $datos->save();
        return $datos;
    }

}