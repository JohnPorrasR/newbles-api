<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\newbles\Repositories\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends ApiController
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        parent::__construct();
        $this->userRepo = $userRepo;
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
            'ID_ROL' => $request->input('ID_ROL'),
        ];
        $usuario = $this->userRepo->insertarUsuario($inputs);
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




























