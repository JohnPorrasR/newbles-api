<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
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
        //
    }

    public function store(UsuarioRequest $request)
    {
        $inputs = [
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ];
        $usuario = $this->usuarioRepo->insertarUsuario($inputs);
        return $this->showOne($usuario);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

    }
}
