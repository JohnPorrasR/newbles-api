<?php
/**
 * Created by PhpStorm.
 * User: JohnVladimir
 * Date: 23/09/2017
 * Time: 15:14
 */

namespace App\newbles\Repositories;


use App\newbles\Entities\ControlTopeAgua;

class ControlTopeAguaRepo
{

    public function listarControlTopeAgua()
    {
        $datos = ControlTopeAgua::where('ESTADO_REGISTRO', 'A')->get();
        return $datos;
    }

    public function consultarControlTopeAgua($cod)
    {
        $datos = ControlTopeAgua::where('ESTADO_REGISTRO', 'A')->where('ID_ATRAPANIEBLAS', $cod)->get();
        return $datos;
    }

    public function insertarControlTopeAgua($inputs)
    {
        $datos = ControlTopeAgua::create($inputs);
        return $datos;
    }

    public function actualizarControlTopeAgua($inputs, $id)
    {
        $datos = ControlTopeAgua::findOrFail($id);
        $datos->fill($inputs);
        $datos->save();
        return $datos;
    }

}