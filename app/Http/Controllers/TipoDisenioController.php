<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\TipoDisenioRepo;
use Illuminate\Http\Request;

class TipoDisenioController extends ApiController
{
    protected $tipoDisenioRepo;

    public function __construct(TipoDisenioRepo $tipoDisenioRepo)
    {
        parent::__construct();
        $this->tipoDisenioRepo = $tipoDisenioRepo;
    }

    public function index()
    {
        $tipoDisenio = $this->tipoDisenioRepo->listarTipoDisenio();
        return $this->showAll($tipoDisenio);
    }

    public function show($cod)
    {
        $tipoDisenio = $this->tipoDisenioRepo->consultarTipoDisenio($cod);
        return $this->showOne($tipoDisenio);
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

        $tipoDisenio = $this->tipoDisenioRepo->insertarTipoDisenio($inputs);
        return $this->showOne($tipoDisenio);

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

        $tipoDisenio = $this->tipoDisenioRepo->actualizarTipoDisenio($inputs, $cod);
        return $this->showOne($tipoDisenio);
    }

    public function destroy($cod)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $tipoDisenio = $this->tipoDisenioRepo->actualizarTipoDisenio($inputs, $cod);
        return $this->showOne($tipoDisenio);
    }

}
