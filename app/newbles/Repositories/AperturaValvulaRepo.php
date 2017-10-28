<?php
/**
 * Created by PhpStorm.
 * User: JohnVladimir
 * Date: 23/09/2017
 * Time: 14:58
 */

namespace App\newbles\Repositories;


use App\newbles\Entities\AperturaValvula;

class AperturaValvulaRepo
{

    public function listarAperturaValvulas()
    {
        $datos = AperturaValvula::where('ESTADO_REGISTRO', 'A')->get();
        return $datos;
    }

    public function consultarAperturaValvula($cod)
    {
        $datos = AperturaValvula::where('ESTADO_REGISTRO', 'A')->where('ID_ATRAPANIEBLAS', $cod)->get();
        return $datos;
    }

    public function insertarAperturaValvula($inputs)
    {
        $datos = AperturaValvula::create($inputs);
        return $datos;
    }

    public function actualizarAperturaValvula($inputs, $id)
    {
        $datos = AperturaValvula::findOrFail($id);
        $datos->fill($inputs);
        $datos->save();
        return $datos;
    }

}