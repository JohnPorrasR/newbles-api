<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\AperturaValvulaRepo;
use Illuminate\Http\Request;

class AperturaValvulaController extends ApiController
{
    protected $aperturaValvulaRepo;

    public function __construct(AperturaValvulaRepo $aperturaValvulaRepo)
    {
        parent::__construct();
        $this->aperturaValvulaRepo = $aperturaValvulaRepo;
    }

    public function index()
    {
        $res = $this->aperturaValvulaRepo->listarAperturaValvulas();
        return $this->showAll($res);
    }

    public function store(Request $request)
    {
        $ID_DISPOSITIVO = $request->input('ID_DISPOSITIVO');
        $FECHA_REGISTRO = $request->input('FECHA_REGISTRO');
        $ESTADO_REGISTRO = $request->input('ESTADO_REGISTRO');
        $inputs = [
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO,
            'FECHA_REGISTRO' => $FECHA_REGISTRO,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];
        $res = $this->aperturaValvulaRepo->insertarAperturaValvula($inputs);
        return $this->showOne($res);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $ID_APERTURA_VALVULA = $id;
        $ID_DISPOSITIVO = $request->input('ID_DISPOSITIVO');
        $inputs = [
            'ID_APERTURA_VALVULA' => $ID_APERTURA_VALVULA,
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO
        ];
        $res = $this->aperturaValvulaRepo->actualizarAperturaValvula($inputs, $ID_APERTURA_VALVULA);
        return $this->showOne($res);
    }

    public function destroy($id)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $res = $this->aperturaValvulaRepo->actualizarDispositivo($inputs, $id);
        return $this->showOne($res);
    }
}
