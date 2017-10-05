<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\CaptacionEstimadaRepo;
use Illuminate\Http\Request;

class CaptacionEstimadaController extends ApiController
{
    protected $captacionEstimadaRepo;

    public function __construct(CaptacionEstimadaRepo $captacionEstimadaRepo)
    {
        $this->captacionEstimadaRepo = $captacionEstimadaRepo;
    }

    public function index()
    {
        $res = $this->captacionEstimadaRepo->listarCaptacionEstimada();
        return $this->showAll($res);
    }

    public function store(Request $request)
    {
        $ID_TIPO_MALLA = $request->input('ID_TIPO_MALLA');
        $LITRO_CAPTACION_METRO_C = $request->input('LITRO_CAPTACION_METRO_C');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION');
        $FECHA_CREACION = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';
        $inputs = [
            'ID_TIPO_MALLA' => $ID_TIPO_MALLA,
            'LITRO_CAPTACION_METRO_C' => $LITRO_CAPTACION_METRO_C,
            'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_CREACION' => $FECHA_CREACION,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];
        $res = $this->captacionEstimadaRepo->insertarCaptacionEstimada($inputs);
        return $this->showOne($res);
    }

    public function show($id)
    {
        $res = $this->captacionEstimadaRepo->listarUnaCaptacionEstimada($id);
        return $this->showAll($res);
    }

    public function update(Request $request, $id)
    {
        $ID_CAPTACION_ESTIMADA = $id;
        $ID_TIPO_MALLA = $request->input('ID_TIPO_MALLA');
        $LITRO_CAPTACION_METRO_C = $request->input('LITRO_CAPTACION_METRO_C');
        $USUARIO_MODIFICACION = $request->input('USUARIO_MODIFICACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");
        $inputs = [
            'ID_CAPTACION_ESTIMADA' => $ID_CAPTACION_ESTIMADA,
            'ID_TIPO_MALLA' => $ID_TIPO_MALLA,
            'LITRO_CAPTACION_METRO_C' => $LITRO_CAPTACION_METRO_C,
            'USUARIO_MODIFICACION' => $USUARIO_MODIFICACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];
        $res = $this->captacionEstimadaRepo->actualizarCaptacionEstimada($inputs, $ID_CAPTACION_ESTIMADA);
        return $this->showOne($res);
    }

    public function destroy($id)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $res = $this->captacionEstimadaRepo->actualizarDispositivo($inputs, $id);
        return $this->showOne($res);
    }
}
