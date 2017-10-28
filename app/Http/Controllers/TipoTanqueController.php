<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\TipoTanqueRepo;
use Illuminate\Http\Request;

class TipoTanqueController extends ApiController
{
    protected $tipoTanqueRepo;

    public function __construct(TipoTanqueRepo $tipoTanqueRepo)
    {
        parent::__construct();
        $this->tipoTanqueRepo = $tipoTanqueRepo;
    }

    public function index()
    {
        $datos = $this->tipoTanqueRepo->listarTipoTanque();
        return $this->showAll($datos);
    }

    public function show($cod)
    {
        $tipoTanque = $this->tipoTanqueRepo->consultarTipoTanque($cod);
        return $this->showOne($tipoTanque);
    }

    public function store(Request $request)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $CAPACIDAD_MINIMA = $request->input('CAPACIDAD_MINIMA');
        $CAPACIDAD_MAXIMA = $request->input('CAPACIDAD_MAXIMA');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION');
        $FECHA_CREACION = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';

        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'CAPACIDAD_MINIMA' => $CAPACIDAD_MINIMA,
            'CAPACIDAD_MAXIMA' => $CAPACIDAD_MAXIMA,
            'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_CREACION' => $FECHA_CREACION,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];

        $tipoTanque = $this->tipoTanqueRepo->insertarTipoTanque($inputs);
        return $this->showOne($tipoTanque);

    }

    public function update(Request $request, $cod)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $CAPACIDAD_MINIMA = $request->input('CAPACIDAD_MINIMA');
        $CAPACIDAD_MAXIMA = $request->input('CAPACIDAD_MAXIMA');
        $USUARIO_MODIFICACION = $request->input('USUARIO_MODIFICACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");

        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'CAPACIDAD_MINIMA' => $CAPACIDAD_MINIMA,
            'CAPACIDAD_MAXIMA' => $CAPACIDAD_MAXIMA,
            'USUARIO_MODIFICACION' => $USUARIO_MODIFICACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];

        $tipoTanque = $this->tipoTanqueRepo->actualizarTipoTanque($inputs, $cod);
        return $this->showOne($tipoTanque);
    }

    public function destroy($cod)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> '0C'
        ];
        $tipoTanque = $this->tipoTanqueRepo->actualizarTipoTanque($inputs, $cod);
        return $this->showOne($tipoTanque);
    }
}
