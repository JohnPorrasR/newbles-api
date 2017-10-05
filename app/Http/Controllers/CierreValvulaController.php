<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\CierreValvulaRepo;
use Illuminate\Http\Request;

class CierreValvulaController extends ApiController
{
    protected $cierreValvulaRepo;

    public function __construct(CierreValvulaRepo $cierreValvulaRepo)
    {
        $this->cierreValvulaRepo = $cierreValvulaRepo;
    }

    public function index()
    {
        $datos = $this->cierreValvulaRepo->listarCierreValvula();
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
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];
        $res = $this->cierreValvulaRepo->insertarCierreValvula($inputs);
        return $this->showOne($res);
    }

    public function show($id)
    {
        $datos = $this->cierreValvulaRepo->listarUnaCierreValvula($id);
        return $this->showOne($datos);
    }

    public function update(Request $request, $id)
    {
        $ID_CIERRE_VALVULA = $id;
        $ID_DISPOSITIVO = $request->input('ID_DISPOSITIVO');
        $inputs = [
            'ID_CIERRE_VALVULA' => $ID_CIERRE_VALVULA,
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO,
        ];
        $res = $this->cierreValvulaRepo->actualizarCierreValvula($inputs, $ID_CIERRE_VALVULA);
        return $this->showOne($res);
    }

    public function destroy($id)
    {
        $ID_CIERRE_VALVULA = $id;
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $res = $this->cierreValvulaRepo->actualizarDispositivo($inputs, $ID_CIERRE_VALVULA);
        return $this->showOne($res);
    }
}
