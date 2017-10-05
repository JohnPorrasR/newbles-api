<?php

namespace App\newbles\Repositories;


use App\newbles\Entities\EstadoAtrapaniebla;

class EstadoAtrapanieblaRepo
{

    public function listarEstadoAtrapaniebla()
    {
        $estadoAtrapaniebla = EstadoAtrapaniebla::where('ESTADO_REGISTRO', '1')->get();
        return $estadoAtrapaniebla;
    }

    public function listarUnEstadoAtrapaniebla($cod)
    {
        $estadoAtrapaniebla = EstadoAtrapaniebla::findOrFail($cod);
        return $estadoAtrapaniebla;
    }

    public function insertarEstadoAtrapaniebla($inputs)
    {
        $estadoAtrapaniebla = EstadoAtrapaniebla::create($inputs);
        return $estadoAtrapaniebla;
    }

    public function actualizarEstadoAtrapaniebla($cod, $inputs)
    {
        $estadoAtrapaniebla = EstadoAtrapaniebla::findOrFail($cod);
        $estadoAtrapaniebla->fill($inputs);
        $estadoAtrapaniebla->save();
        return $estadoAtrapaniebla;
    }
}