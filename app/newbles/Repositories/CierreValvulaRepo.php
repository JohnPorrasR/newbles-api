<?php
/**
 * Created by PhpStorm.
 * User: JohnVladimir
 * Date: 23/09/2017
 * Time: 15:15
 */

namespace App\newbles\Repositories;


use App\newbles\Entities\CierreValvula;

class CierreValvulaRepo
{

    public function listarCierreValvula()
    {
        $datos = CierreValvula::where('ESTADO_REGISTRO', 'A')->get();
        return $datos;
    }

    public function listarUnaCierreValvula($cod)
    {
        $datos = CierreValvula::where('ESTADO_REGISTRO', 'A')->where('ID_ATRAPANIEBLAS', $cod)->get();
        return $datos;
    }

    public function insertarCierreValvula($inputs)
    {
        $datos = CierreValvula::create($inputs);
        return $datos;
    }

    public function actualizarCierreValvula($inputs, $id)
    {
        $datos = CierreValvula::findOrFail($id);
        $datos->fill($inputs);
        $datos->save();
        return $datos;
    }

}