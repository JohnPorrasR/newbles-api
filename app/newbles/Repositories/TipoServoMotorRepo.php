<?php

namespace App\newbles\Repositories;


use App\newbles\Entities\TipoServoMotor;

class TipoServoMotorRepo
{

    public function litarTipoServoMotor()
    {
        $tipoServoMotor = TipoServoMotor::where('ESTADO_REGISTRO', 'A')->get();
        return $tipoServoMotor;
    }

    public function consultarTipoServoMotor($cod)
    {
        $tipoServoMotor = TipoServoMotor::findOrFail($cod);
        return $tipoServoMotor;
    }

    public function insertarTipoServoMotor($inputs)
    {
        $tipoServoMotor = TipoServoMotor::create($inputs);
        return $tipoServoMotor;
    }

    public function actualizarTipoServoMotor($inputs, $id)
    {
        $tipoServoMotor = TipoServoMotor::findOrFail($id);
        $tipoServoMotor->fill($inputs);
        $tipoServoMotor->save();
        return $tipoServoMotor;
    }

}