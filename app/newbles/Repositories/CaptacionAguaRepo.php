<?php
/**
 * Created by PhpStorm.
 * User: JohnVladimir
 * Date: 23/09/2017
 * Time: 15:15
 */

namespace App\newbles\Repositories;


use App\newbles\Entities\CaptacionAgua;

class CaptacionAguaRepo
{

    public function listarCaptacionAgua()
    {
        $datos = CaptacionAgua::where('ESTADO_REGISTRO', 'A')->get();
        return $datos;
    }

    public function listarUnCaptacionAgua($cod)
    {
        $datos = CaptacionAgua::where('ESTADO_REGISTRO', 'A')->where('ID_ATRAPANIEBLAS', $cod)->get();
        return $datos;
    }

    public function insertarCaptacionAgua($inputs)
    {
        $datos = CaptacionAgua::create($inputs);
        return $datos;
    }

    public function actualizarCaptacionAgua($inputs, $id)
    {
        $datos = CaptacionAgua::findOrFail($id);
        $datos->fill($inputs);
        $datos->save();
        return $datos;
    }

}