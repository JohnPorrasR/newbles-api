<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\EstadoAtrapanieblaRepo;
use Illuminate\Http\Request;

class EstadoTransaccionController extends ApiController
{
    protected $estadoAtrapanieblaRepo;

    public function __construct(EstadoAtrapanieblaRepo $estadoAtrapanieblaRepo)
    {
        $this->estadoAtrapanieblaRepo = $estadoAtrapanieblaRepo;
    }

    public function index()
    {
        $data = $this->estadoAtrapanieblaRepo->listarEstadoAtrapaniebla();
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $DESCRIPCION = $request->input('DESCRIPCION');
        $USUARIO_REGISTRO = $request->input('USUARIO_REGISTRO');
        $FECHA_REGISTRO = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';
        $inputs = [
            'DESCRIPCION' => $DESCRIPCION,
            'USUARIO_REGISTRO' => $USUARIO_REGISTRO,
            'FECHA_REGISTRO' => $FECHA_REGISTRO,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];
        $datos = $this->estadoAtrapanieblaRepo->insertarEstadoAtrapaniebla($inputs);
        return $this->showOne($datos);
    }

    public function show($id)
    {
        $datos = $this->estadoAtrapanieblaRepo->listarUnEstadoAtrapaniebla($id);
        return $this->showOne($datos);
    }

    public function update(Request $request, $id)
    {
        $ID_ESTADO_ATRAPANIEBLAS = $id;
        $DESCRIPCION = $request->input('DESCRIPCION');
        $USUARIO_MODIFICACION = $request->input('USUARIO_MODIFICACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");
        $inputs = [
            'ID_ESTADO_ATRAPANIEBLAS' => $ID_ESTADO_ATRAPANIEBLAS,
            'DESCRIPCION' => $DESCRIPCION,
            'USUARIO_MODIFICACION' => $USUARIO_MODIFICACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];
        $datos = $this->estadoAtrapanieblaRepo->insertarEstadoAtrapaniebla($inputs);
        return $this->showOne($datos);
    }

    public function destroy($id)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $datos = $this->estadoAtrapanieblaRepo->actualizarEstadoAtrapaniebla($id, $inputs);
        return $this->showOne($datos);
    }
}
