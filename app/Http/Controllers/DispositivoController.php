<?php

namespace App\Http\Controllers;

use App\Http\Requests\DispositivoRequest;
use App\newbles\Repositories\DispositivoRepo;
use Illuminate\Http\Request;

class DispositivoController extends ApiController
{
    protected $dispositivoRepo;

    public function __construct(DispositivoRepo $dispositivoRepo)
    {
        parent::__construct();
        $this->dispositivoRepo = $dispositivoRepo;
    }

    public function index()
    {
        $dispositivos = $this->dispositivoRepo->listarDispositivos();
        return $this->showAll($dispositivos);
    }

    public function show($cod)
    {
        $dispositivo = $this->dispositivoRepo->listarUnDispositivo($cod);
        return $this->showOne($dispositivo);
    }

    public function store(DispositivoRequest $request)
    {
        $ID_TIPO_SERVOMOTOR = $request->input('ID_TIPO_SERVOMOTOR'); $ID_TIPO_BATERIA = $request->input('ID_TIPO_BATERIA');
        $DESCRIPCION = $request->input('DESCRIPCION'); $NUMERO_PLACA = $request->input('NUMERO_PLACA');
        $VIDA_UTIL_MINIMA = $request->input('VIDA_UTIL_MINIMA'); $VIDA_UTIL_MAXIMA = $request->input('VIDA_UTIL_MAXIMA');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION'); $ESTADO_REGISTRO = 'P';

        $inputs = [
            'ID_TIPO_SERVOMOTOR'=> $ID_TIPO_SERVOMOTOR, 'ID_TIPO_BATERIA'=> $ID_TIPO_BATERIA,
            'DESCRIPCION'=> $DESCRIPCION, 'NUMERO_PLACA'=> $NUMERO_PLACA,
            'VIDA_UTIL_MINIMA'=> $VIDA_UTIL_MINIMA, 'VIDA_UTIL_MAXIMA'=> $VIDA_UTIL_MAXIMA,
            'USUARIO_CREACION'=> $USUARIO_CREACION, 'FECHA_CREACION' => date("Y-m-d H:i:s"), 'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];

        $dispositivo = $this->dispositivoRepo->insertarDispositivo($inputs);
        return $this->showOne($dispositivo);

    }

    public function update(DispositivoRequest $request, $cod)
    {
        $ID_DISPOSITIVO = $cod;
        $ID_TIPO_SERVOMOTOR = $request->input('ID_TIPO_SERVOMOTOR'); $ID_TIPO_BATERIA = $request->input('ID_TIPO_BATERIA');
        $DESCRIPCION = $request->input('DESCRIPCION'); $NUMERO_PLACA = $request->input('NUMERO_PLACA');
        $VIDA_UTIL_MINIMA = $request->input('VIDA_UTIL_MINIMA'); $VIDA_UTIL_MAXIMA = $request->input('VIDA_UTIL_MAXIMA');
        $USUARIO_MODIFICACION = $request->input('USUARIO_MODIFICACION');

        $inputs = [
            'ID_DISPOSITIVO' => $ID_DISPOSITIVO, 'ID_TIPO_SERVOMOTOR'=> $ID_TIPO_SERVOMOTOR, 'ID_TIPO_BATERIA'=> $ID_TIPO_BATERIA,
            'DESCRIPCION'=> $DESCRIPCION, 'NUMERO_PLACA'=> $NUMERO_PLACA,
            'VIDA_UTIL_MINIMA'=> $VIDA_UTIL_MINIMA, 'VIDA_UTIL_MAXIMA'=> $VIDA_UTIL_MAXIMA,
            'FECHA_CREACION' => date("Y-m-d H:i:s"), 'USUARIO_MODIFICACION'=> $USUARIO_MODIFICACION
        ];

        $dispositivo = $this->dispositivoRepo->actualizarDispositivo($inputs, $ID_DISPOSITIVO);
        return $this->showOne($dispositivo);
    }

    public function destroy($cod)
    {
        $ID_DISPOSITIVO = $cod;
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $dispositivo = $this->dispositivoRepo->actualizarDispositivo($inputs, $ID_DISPOSITIVO);
        return $this->showOne($dispositivo);
    }

    public function captacionAgua($id, $MONTH, $YEAR)
    {
        $data = $this->dispositivoRepo->captacionAgua($id, $MONTH, $YEAR);
        return $data;
    }

    public function captacionAguaTodos($MONTH, $YEAR)
    {
        $data = $this->dispositivoRepo->captacionAguaTodos($MONTH, $YEAR);
        return $data;
    }

}
