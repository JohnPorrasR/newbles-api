<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\TipoBateriaRepo;
use Illuminate\Http\Request;

class TipoBateriaController extends ApiController
{
    protected $tipoBateriaRepo;

    public function __construct(TipoBateriaRepo $tipoBateriaRepo)
    {
        $this->tipoBateriaRepo = $tipoBateriaRepo;
    }

    public function index()
    {
        $tipoBaterias = $this->tipoBateriaRepo->listarTipoBateria();
        return $this->showAll($tipoBaterias);
    }

    public function show($cod)
    {
        $tipoBaterias = $this->tipoBateriaRepo->listarUnTipoBateria($cod);
        return $this->showOne($tipoBaterias);
    }

    public function store(Request $request)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $FECHA_COMPRA = $request->input('FECHA_COMPRA');
        $FECHA_CADUCIDAD = $request->input('FECHA_CADUCIDAD');
        $VOLTAJE_MINIMO = $request->input('VOLTAJE_MINIMO');
        $VOLTAJE_MAXIMO = $request->input('VOLTAJE_MAXIMO');
        $AMPERAJE = $request->input('AMPERAJE');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION');
        $FECHA_CREACION = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';

        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'FECHA_COMPRA' => $FECHA_COMPRA,
            'FECHA_CADUCIDAD' => $FECHA_CADUCIDAD,
            'VOLTAJE_MINIMO' => $VOLTAJE_MINIMO,
            'VOLTAJE_MAXIMO' => $VOLTAJE_MAXIMO,
            'AMPERAJE' => $AMPERAJE,
            'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_CREACION' => $FECHA_CREACION,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];

        $tipoBateria = $this->tipoBateriaRepo->insertarTipoBateria($inputs);
        return $this->showOne($tipoBateria);

    }

    public function update(Request $request, $cod)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $FECHA_COMPRA = $request->input('FECHA_COMPRA');
        $FECHA_CADUCIDAD = $request->input('FECHA_CADUCIDAD');
        $VOLTAJE_MINIMO = $request->input('VOLTAJE_MINIMO');
        $VOLTAJE_MAXIMO = $request->input('VOLTAJE_MAXIMO');
        $AMPERAJE = $request->input('AMPERAJE');
        $USUARIO_MODIFICACION = $request->input('USUARIO_MODIFICACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");

        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'FECHA_COMPRA' => $FECHA_COMPRA,
            'FECHA_CADUCIDAD' => $FECHA_CADUCIDAD,
            'VOLTAJE_MINIMO' => $VOLTAJE_MINIMO,
            'VOLTAJE_MAXIMO' => $VOLTAJE_MAXIMO,
            'AMPERAJE' => $AMPERAJE,
            'USUARIO_MODIFICACION' => $USUARIO_MODIFICACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];

        $tipoBateria = $this->tipoBateriaRepo->actualizarTipoBateria($inputs, $cod);
        return $this->showOne($tipoBateria);
    }

    public function destroy($cod)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $tipoBateria = $this->tipoBateriaRepo->actualizarTipoBateria($inputs, $cod);
        return $this->showOne($tipoBateria);
    }
}
