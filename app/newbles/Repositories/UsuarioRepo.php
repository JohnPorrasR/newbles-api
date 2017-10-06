<?php
/**
 * Created by PhpStorm.
 * User: LOPP02
 * Date: 04/10/2017
 * Time: 16:57
 */

namespace App\newbles\Repositories;


use App\User;

class UsuarioRepo
{

    public function litarUsuario()
    {
        $tipoServoMotor = User::all();
        return $tipoServoMotor;
    }

    public function listarUnUsuario($cod)
    {
        $tipoServoMotor = User::findOrFail($cod);
        return $tipoServoMotor;
    }

    public function insertarUsuario($inputs)
    {
        $tipoServoMotor = User::create($inputs);
        return $tipoServoMotor;
    }

    public function actualizarUsuario($inputs, $id)
    {
        $tipoServoMotor = User::findOrFail($id);
        $tipoServoMotor->fill($inputs);
        $tipoServoMotor->save();
        return $tipoServoMotor;
    }

}