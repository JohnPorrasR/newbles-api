<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\TipoMallaRepo;
use Illuminate\Http\Request;

class TipoMallaController extends ApiController
{
    protected $tipoMallaRepo;

    public function __construct(TipoMallaRepo $tipoMallaRepo)
    {
        parent::__construct();
        $this->tipoMallaRepo = $tipoMallaRepo;
    }

    public function index()
    {
        $tipoMalla = $this->tipoMallaRepo->listarTipoMalla();
        return $this->showAll($tipoMalla);
    }

    public function show($cod)
    {
        $tipoMalla = $this->tipoMallaRepo->consultarTipoMalla($cod);
        return $this->showOne($tipoMalla);
    }

    public function store(Request $request)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION');
        $FECHA_CREACION = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';

        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_CREACION' => $FECHA_CREACION,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];

        $tipoMalla = $this->tipoMallaRepo->insertarTipoMalla($inputs);
        return $this->showOne($tipoMalla);

    }

    public function update(Request $request, $cod)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $USUARIO_MODIFICACION = $request->input('USUARIO_MODIFICACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");

        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'USUARIO_MODIFICACION' => $USUARIO_MODIFICACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];

        $tipoMalla = $this->tipoMallaRepo->actualizarTipoMalla($inputs, $cod);
        return $this->showOne($tipoMalla);
    }

    public function destroy($cod)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $tipoMalla = $this->tipoMallaRepo->actualizarTipoMalla($inputs, $cod);
        return $this->showOne($tipoMalla);
    }

}
