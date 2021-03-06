<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\PersonaRepo;
use Illuminate\Http\Request;

class PersonaController extends ApiController
{
    protected $personaRepo;

    public function __construct(PersonaRepo $personaRepo)
    {
        parent::__construct();
        $this->personaRepo = $personaRepo;
    }

    public function index()
    {
        $data = $this->personaRepo->litarPersona();
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $ID_UNIDAD_ORGANICA = $request->input('ID_UNIDAD_ORGANICA');
        $DNI = $request->input('DNI');
        $NOMBRES = $request->input('NOMBRES');
        $APELLIDO_PATERNO = $request->input('APELLIDO_PATERNO');
        $APELLIDO_MATERNO = $request->input('APELLIDO_MATERNO');
        $USUARIO_CREACION = $request->input('USUARIO_CREACION');
        $CORREO = $request->input('CORREO');
        $FECHA_CREACION = date("Y-m-d H:i:s");
        $ESTADO_REGISTRO = 'A';

        $inputs = [
            'ID_UNIDAD_ORGANICA' => $ID_UNIDAD_ORGANICA,
            'DNI' => $DNI,
            'NOMBRES' => $NOMBRES,
            'APELLIDO_PATERNO' => $APELLIDO_PATERNO,
            'APELLIDO_MATERNO' => $APELLIDO_MATERNO,
            'USUARIO_CREACION' => $USUARIO_CREACION,
            'FECHA_CREACION' => $FECHA_CREACION,
            'ESTADO_REGISTRO' => $ESTADO_REGISTRO,
            'CORREO' => $CORREO
        ];

        $data = $this->personaRepo->insertarPersona($inputs);
        return $this->showOne($data);
    }

    public function show($id)
    {
        $data = $this->personaRepo->consultarPersona($id);
        return $this->showOne($data);
    }

    public function update(Request $request, $id)
    {
        $ID_PERSONA = $request->input('ID_PERSONA');
        $ID_UNIDAD_ORGANICA = $request->input('ID_UNIDAD_ORGANICA');
        $DNI = $request->input('DNI');
        $NOMBRES = $request->input('NOMBRES');
        $APELLIDO_PATERNO = $request->input('APELLIDO_PATERNO');
        $APELLIDO_MATERNO = $request->input('APELLIDO_MATERNO');
        $USUARIO_MODIFICACION = $request->input('USUARIO_MODIFICACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");
        $CORREO = $request->input('CORREO');

        $inputs = [
            'ID_PERSONA' => $ID_PERSONA,
            'ID_UNIDAD_ORGANICA' => $ID_UNIDAD_ORGANICA,
            'DNI' => $DNI,
            'NOMBRES' => $NOMBRES,
            'APELLIDO_PATERNO' => $APELLIDO_PATERNO,
            'APELLIDO_MATERNO' => $APELLIDO_MATERNO,
            'USUARIO_MODIFICACION' => $USUARIO_MODIFICACION,
            'FECHA_MODIFICACION' => $FECHA_MODIFICACION,
            'CORREO' => $CORREO
        ];
        $data = $this->personaRepo->actualizarPersona($inputs, $id);
        return $this->showOne($data);
    }

    public function destroy($id)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $data = $this->personaRepo->actualizarPersona($inputs, $id);
        return $this->showOne($data);
    }

}
