<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\UsuarioRepo;
use Illuminate\Http\Request;

class UsuarioController extends ApiController
{
    protected $usuarioRepo;

    public function __construct(UsuarioRepo $usuarioRepo)
    {
        $this->usuarioRepo = $usuarioRepo;
    }


    public function index()
    {
        $data = $this->usuarioRepo->litarUsuario();
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $ID_PERSONA = $request->input('ID_PERSONA');
        $ID_PREGUNTA = $request->input('ID_PREGUNTA');
        $ID_ROL = $request->input('ID_ROL');
        $ALIAS = $request->input('ALIAS');
        $PASSWORD = $request->input('PASSWORD');
        $RESPUESTA_SECRETA = $request->input('RESPUESTA_SECRETA');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION');
        $FECHA_CREACION = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';

        $inputs = [
            'ID_PERSONA' => $ID_PERSONA,
            'ID_PREGUNTA' => $ID_PREGUNTA,
            'ID_ROL' => $ID_ROL,
            'ALIAS' => $ALIAS,
            'PASSWORD' => md5($PASSWORD),
            'RESPUESTA_SECRETA' => $RESPUESTA_SECRETA,
            'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_CREACION' => $FECHA_CREACION,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO
        ];

        $data = $this->usuarioRepo->insertarUsuario($inputs);
        return $this->showOne($data);
    }

    public function show($id)
    {
        $data = $this->usuarioRepo->listarUnUsuario($id);
        return $this->showOne($data);
    }

    public function update(Request $request, $id)
    {
        $ID_USUARIO = $id;
        $ID_PERSONA = $request->input('ID_PERSONA');
        $ID_PREGUNTA = $request->input('ID_PREGUNTA');
        $ID_ROL = $request->input('ID_ROL');
        $ALIAS = $request->input('ALIAS');
        $PASSWORD = $request->input('PASSWORD');
        $RESPUESTA_SECRETA = $request->input('RESPUESTA_SECRETA');
        $USUARIO_MODIFICACION = date("Y-m-d H:i:s");
        $FECHA_MODIFICACION = $request->input('FECHA_MODIFICACION');

        $inputs = [
            'ID_USUARIO' => $ID_USUARIO,
            'ID_PERSONA' => $ID_PERSONA,
            'ID_PREGUNTA' => $ID_PREGUNTA,
            'ID_ROL' => $ID_ROL,
            'ALIAS' => $ALIAS,
            'PASSWORD' => bcrypt($PASSWORD),
            'RESPUESTA_SECRETA' => $RESPUESTA_SECRETA,
            'USUARIO_MODIFICACION' => $USUARIO_MODIFICACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];

        $data = $this->usuarioRepo->actualizarUsuario($inputs, $ID_USUARIO);
        return $this->showOne($data);

    }

    public function destroy($id)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> '0C'
        ];
        $data = $this->usuarioRepo->actualizarUsuario($inputs, $id);
        return $this->showOne($data);
    }

    public function login(Request $request)
    {
        $usu = $request->input('ALIAS');
        $clave = $request->input('PASSWORD');

        $data = $this->usuarioRepo->login($usu, md5($clave));
        return $data;

    }

}
