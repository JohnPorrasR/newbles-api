<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtrapanieblasRequest;
use App\newbles\Repositories\AtrapanieblaRepo;
use App\newbles\Repositories\FotoAtrapanieblaRepo;
use Illuminate\Http\Request;

class AtrapanieblaController extends ApiController
{
    protected $atrapanieblaRepo;
    protected $fotoAtrapanieblaRepo;

    public function __construct(AtrapanieblaRepo $atrapanieblaRepo, FotoAtrapanieblaRepo $fotoAtrapanieblaRepo)
    {
        $this->atrapanieblaRepo = $atrapanieblaRepo;
        $this->fotoAtrapanieblaRepo = $fotoAtrapanieblaRepo;
    }

    public function index()
    {
        $atrapanieblas = $this->atrapanieblaRepo->listarAprataniebla();
        return $this->showAll($atrapanieblas);
    }

    public function show($cod)
    {
        $atrapaniebla = $this->atrapanieblaRepo->listarUnAprataniebla($cod);
        return $this->showAll($atrapaniebla);
    }

    public function store(Request $request)
    {
        $ID_DISPOSITIVO = $request->input('ID_DISPOSITIVO');
        $ID_TIPO_TANQUE = $request->input('ID_TIPO_TANQUE');
        $ID_TIPO_DISENIO = $request->input('ID_TIPO_DISENIO');
        $ID_TIPO_MALLA = $request->input('ID_TIPO_MALLA');
        $ID_ESTADO_ATRAPANIEBLAS = $request->input('ID_ESTADO_ATRAPANIEBLAS');
        $ANCHO = $request->input('ANCHO');
        $ALTO = $request->input('ALTO');
        $LONGITUD = $request->input('LONGITUD');
        $LATITUD = $request->input('LATITUD');
        $FECHA_VIGENCIA = $request->input('FECHA_VIGENCIA');
        $HUMEDAD_PROMEDIO = $request->input('HUMEDAD_PROMEDIO');
        $OBSERVACION = $request->input('OBSERVACION');
        $USUARIO_CREACION = 1;
        $FECHA_CREACION = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'P';
        $inputs = [
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO, 'ID_TIPO_TANQUE' => $ID_TIPO_TANQUE,
            'ID_TIPO_DISENIO' => $ID_TIPO_DISENIO, 'ID_TIPO_MALLA' => $ID_TIPO_MALLA,
            'ID_ESTADO_ATRAPANIEBLAS' => $ID_ESTADO_ATRAPANIEBLAS, 'ANCHO' => $ANCHO,
            'ALTO' => $ALTO, 'LONGITUD' => $LONGITUD, 'LATITUD' => $LATITUD,
            'FECHA_VIGENCIA' => $FECHA_VIGENCIA, 'HUMEDAD_PROMEDIO' => $HUMEDAD_PROMEDIO,
            'OBSERVACION' => $OBSERVACION, 'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_CREACION' => $FECHA_CREACION, 'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];
        $res = $this->atrapanieblaRepo->insertarAprataniebla($inputs);
        return $this->showAll($res);
    }

    public function update(AtrapanieblasRequest $request, $cod)
    {
        $ID_ATRAPANIEBLAS = $cod;
        $ID_DISPOSITIVO = $request->input('ID_DISPOSITIVO');
        $ID_TIPO_TANQUE = $request->input('ID_TIPO_TANQUE');
        $ID_TIPO_DISENIO = $request->input('ID_TIPO_DISENIO');
        $ID_TIPO_MALLA = $request->input('ID_TIPO_MALLA');
        $ID_ESTADO_ATRAPANIEBLAS = $request->input('ID_ESTADO_ATRAPANIEBLAS');
        $ANCHO = $request->input('ANCHO');
        $ALTO = $request->input('ALTO');
        $LONGITUD = $request->input('LONGITUD');
        $LATITUD = $request->input('LATITUD');
        $FECHA_VIGENCIA = $request->input('FECHA_VIGENCIA');
        $HUMEDAD_PROMEDIO = $request->input('HUMEDAD_PROMEDIO');
        $OBSERVACION = $request->input('OBSERVACION');
        $USUARIO_MODIFICACION = $request->input('USUARIO_CREACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");
        $inputs = [
            'ID_ATRAPANIEBLAS' => $ID_ATRAPANIEBLAS,
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO, 'ID_TIPO_TANQUE' => $ID_TIPO_TANQUE,
            'ID_TIPO_DISENIO' => $ID_TIPO_DISENIO, 'ID_TIPO_MALLA' => $ID_TIPO_MALLA,
            'ID_ESTADO_ATRAPANIEBLAS' => $ID_ESTADO_ATRAPANIEBLAS, 'ANCHO' => $ANCHO,
            'ALTO' => $ALTO, 'LONGITUD' => $LONGITUD, 'LATITUD' => $LATITUD,
            'FECHA_VIGENCIA' => $FECHA_VIGENCIA, 'HUMEDAD_PROMEDIO' => $HUMEDAD_PROMEDIO,
            'OBSERVACION' => $OBSERVACION, 'USUARIO_MODIFICACION' => $USUARIO_MODIFICACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];

        $atrapaniebla = $this->atrapanieblaRepo->actualizarAprataniebla($inputs, $ID_ATRAPANIEBLAS);
        return $this->showOne($atrapaniebla);
    }

    public function destroy($cod)
    {
        $ID_ATRAPANIEBLAS = $cod;
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $atrapaniebla = $this->atrapanieblaRepo->actualizarAprataniebla($inputs, $ID_ATRAPANIEBLAS);
        return $this->showOne($atrapaniebla);
    }

    public function listarAtrapanieblasPendientes()
    {
        $atrapanieblas = $this->atrapanieblaRepo->listarAtrapanieblasPendientes();
        return $this->showAll($atrapanieblas);
    }

    public function validarAtrapanieblas(Request $request)
    {
        $cod = $request->input('cod');
        $tipo = $request->input('tipo');
        $inputs = [
            'ESTADO_REGISTRO'=> $tipo
        ];
        $atrapaniebla = $this->atrapanieblaRepo->actualizarAprataniebla($inputs, $cod);
        return $this->showOne($atrapaniebla);
    }

}
