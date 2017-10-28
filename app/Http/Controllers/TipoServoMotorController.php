<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\TipoServoMotorRepo;
use Illuminate\Http\Request;

class TipoServoMotorController extends ApiController
{
    protected $tipoServoMotorRepo;

    public function __construct(TipoServoMotorRepo $tipoServoMotorRepo)
    {
        parent::__construct();
        $this->tipoServoMotorRepo = $tipoServoMotorRepo;
    }

    public function index()
    {
        $tipoServoMotor = $this->tipoServoMotorRepo->litarTipoServoMotor();
        return $this->showAll($tipoServoMotor);
    }

    public function show($cod)
    {
        $tipoServoMotor = $this->tipoServoMotorRepo->consultarTipoServoMotor($cod);
        return $this->showOne($tipoServoMotor);
    }

    public function store(Request $request)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $CAPACIDAD_MAXIMA = $request->input('CAPACIDAD_MAXIMA');
        $CAPACIDAD_MINIMA = $request->input('CAPACIDAD_MINIMA');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION');
        $FECHA_CREACION = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';

        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'CAPACIDAD_MAXIMA' => $CAPACIDAD_MAXIMA,
            'CAPACIDAD_MINIMA' => $CAPACIDAD_MINIMA,
            'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_CREACION' => $FECHA_CREACION,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];

        $tipoServoMotor = $this->tipoServoMotorRepo->insertarTipoServoMotor($inputs);
        return $this->showOne($tipoServoMotor);

    }

    public function update(Request $request, $cod)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $CAPACIDAD_MAXIMA = $request->input('CAPACIDAD_MAXIMA');
        $CAPACIDAD_MINIMA = $request->input('CAPACIDAD_MINIMA');
        $USUARIO_MODIFICACION = $request->input('USUARIO_MODIFICACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");

        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'CAPACIDAD_MAXIMA' => $CAPACIDAD_MAXIMA,
            'CAPACIDAD_MINIMA' => $CAPACIDAD_MINIMA,
            'USUARIO_MODIFICACION' => $USUARIO_MODIFICACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];

        $tipoServoMotor = $this->tipoServoMotorRepo->actualizarTipoServoMotor($inputs, $cod);
        return $this->showOne($tipoServoMotor);
    }

    public function destroy($cod)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $tipoServoMotor = $this->tipoServoMotorRepo->actualizarTipoServoMotor($inputs, $cod);
        return $this->showOne($tipoServoMotor);
    }
}
