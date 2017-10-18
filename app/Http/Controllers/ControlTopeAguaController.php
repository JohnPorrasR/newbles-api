<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\ControlTopeAguaRepo;
use Illuminate\Http\Request;

class ControlTopeAguaController extends ApiController
{
    protected $controlTopeAguaRepo;

    public function __construct(ControlTopeAguaRepo $controlTopeAguaRepo)
    {
        parent::__construct();
        $this->controlTopeAguaRepo = $controlTopeAguaRepo;
    }

    public function index()
    {
        $datos = $this->controlTopeAguaRepo->listarControlTopeAgua();
        return $this->showAll($datos);
    }

    public function store(Request $request)
    {
        $ID_DISPOSITIVO = $request->input('ID_DISPOSITIVO');
        $FECHA_REGISTRO = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';
        $inputs = [
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO,
            'FECHA_REGISTRO' => $FECHA_REGISTRO,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO,
        ];
        $res = $this->controlTopeAguaRepo->insertarControlTopeAgua($inputs);
        return $this->showOne($res);
    }

    public function show($id)
    {
        $datos = $this->controlTopeAguaRepo->listarUnaControlTopeAgua($id);
        return $this->showOne($datos);
    }

    public function update(Request $request, $id)
    {
        $ID_TOPE_AGUA = $id;
        $ID_DISPOSITIVO = $request->input('ID_DISPOSITIVO');
        $inputs = [
            'ID_TOPE_AGUA' => $ID_TOPE_AGUA,
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO,
        ];
        $res = $this->controlTopeAguaRepo->actualizarControlTopeAgua($inputs, $ID_TOPE_AGUA);
        return $this->showOne($res);
    }

    public function destroy($id)
    {
        $ID_TOPE_AGUA = $id;
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $res = $this->controlTopeAguaRepo->actualizarDispositivo($inputs, $ID_TOPE_AGUA);
        return $this->showOne($res);
    }

}
