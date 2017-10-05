<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\CaptacionAguaRepo;
use Illuminate\Http\Request;

class CaptacionAguaController extends ApiController
{
    protected $captacionAguaRepo;

    public function __construct(CaptacionAguaRepo $captacionAguaRepo)
    {
        $this->captacionAguaRepo = $captacionAguaRepo;
    }

    public function index()
    {
        $res = $this->captacionAguaRepo->listarCaptacionAgua();
        return $this->showAll($res);
    }

    public function store(Request $request)
    {
        $ID_DISPOSITIVO = $request->input('ID_DISPOSITIVO');
        $ID_ESTADO_TRANSACCION = $request->input('ID_ESTADO_TRANSACCION');
        $CANTIDAD_CAPTADA = $request->input('CANTIDAD_CAPTADA');
        $FECHA_REGISTRO = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';
        $inputs = [
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO,
            'ID_ESTADO_TRANSACCION' => $ID_ESTADO_TRANSACCION,
            'CANTIDAD_CAPTADA' => $CANTIDAD_CAPTADA,
            'FECHA_REGISTRO' => $FECHA_REGISTRO,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];
        $res = $this->captacionAguaRepo->insertarCaptacionAgua($inputs);
        return $this->showOne($res);
    }

    public function show($id)
    {
        $res = $this->captacionAguaRepo->listarUnCaptacionAgua($id);
        return $this->showOne($res);
    }

    public function update(Request $request, $id)
    {
        $ID_CAPTACION_AGUA = $id;
        $ID_DISPOSITIVO = $request->input('ID_DISPOSITIVO');
        $ID_ESTADO_TRANSACCION = $request->input('ID_ESTADO_TRANSACCION');
        $CANTIDAD_CAPTADA = $request->input('CANTIDAD_CAPTADA');
        $inputs = [
            'ID_CAPTACION_AGUA' => $ID_CAPTACION_AGUA,
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO,
            'ID_ESTADO_TRANSACCION' => $ID_ESTADO_TRANSACCION,
            'CANTIDAD_CAPTADA' => $CANTIDAD_CAPTADA
        ];
        $res = $this->captacionAguaRepo->actualizarCaptacionAgua($inputs, $ID_CAPTACION_AGUA);
        return $this->showOne($res);
    }

    public function destroy($id)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $res = $this->captacionAguaRepo->actualizarDispositivo($inputs, $id);
        return $this->showOne($res);
    }
}
