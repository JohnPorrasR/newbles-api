<?php

namespace App\Http\Controllers;


use App\newbles\Repositories\EstadoAtrapanieblaRepo;
use Illuminate\Http\Request;

class EstadoAtrapanieblaController extends ApiController
{
    protected $estadoAtrapanieblaRepo;

    public function __construct(EstadoAtrapanieblaRepo $estadoAtrapanieblaRepo)
    {
        $this->estadoAtrapanieblaRepo = $estadoAtrapanieblaRepo;
    }

    public function index()
    {
        $tipoServoMotor = $this->estadoAtrapanieblaRepo->listarEstadoAtrapaniebla();
        return $this->showAll($tipoServoMotor);
    }

    public function show($cod)
    {
        $tipoServoMotor = $this->estadoAtrapanieblaRepo->listarUnEstadoAtrapaniebla($cod);
        return $this->showOne($tipoServoMotor);
    }

    public function store(Request $request)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $CAPACIDAD_MAXIMA = $request->input('CAPACIDAD_MAXIMA');
        $CAPACIDAD_MINIMA = $request->input('CAPACIDAD_MINIMA');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION');
        $FECHA_CREACION = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'P';
        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'CAPACIDAD_MAXIMA' => $CAPACIDAD_MAXIMA,
            'CAPACIDAD_MINIMA' => $CAPACIDAD_MINIMA,
            'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_CREACION' => $FECHA_CREACION,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];
        $tipoServoMotor = $this->estadoAtrapanieblaRepo->insertarEstadoAtrapaniebla($inputs);
        return $this->showOne($tipoServoMotor);
    }

    public function update(Request $request, $cod)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $CAPACIDAD_MAXIMA = $request->input('CAPACIDAD_MAXIMA');
        $CAPACIDAD_MINIMA = $request->input('CAPACIDAD_MINIMA');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");
        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'CAPACIDAD_MAXIMA' => $CAPACIDAD_MAXIMA,
            'CAPACIDAD_MINIMA' => $CAPACIDAD_MINIMA,
            'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];
        $tipoServoMotor = $this->estadoAtrapanieblaRepo->actualizarEstadoAtrapaniebla($inputs, $cod);
        return $this->showOne($tipoServoMotor);
    }

    public function destroy($cod)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $tipoServoMotor = $this->estadoAtrapanieblaRepo->actualizarEstadoAtrapaniebla($inputs, $cod);
        return $this->showOne($tipoServoMotor);
    }
}
