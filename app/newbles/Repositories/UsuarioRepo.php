<?php
/**
 * Created by PhpStorm.
 * User: LOPP02
 * Date: 06/10/2017
 * Time: 11:52
 */

namespace App\newbles\Repositories;


use App\newbles\Entities\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioRepo
{

    public function litarUsuario()
    {
        $usuario = Usuario::all();
        return $usuario;
    }

    public function listarUnUsuario($cod)
    {
        $usuario = Usuario::findOrFail($cod);
        return $usuario;
    }

    public function insertarUsuario($inputs)
    {
        $usuario = Usuario::create($inputs);
        return $usuario;
    }

    public function actualizarUsuario($inputs, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->fill($inputs);
        $usuario->save();
        return $usuario;
    }

    public function login($usu, $pass)
    {
        $data = Usuario::where('ALIAS', $usu)->get();
        return $data;
    }

}























