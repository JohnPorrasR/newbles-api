<?php

namespace App\newbles\Repositories;


use App\newbles\Entities\TipoTanque;

class TipoTanqueRepo
{

    public function listarTipoTanque()
    {
        $tipoTanque = TipoTanque::where('ESTADO_REGISTRO', 'A')->get();
        return $tipoTanque;
    }

    public function consultarTipoTanque($cod)
    {
        $tipoTanque = TipoTanque::findOrFail($cod);
        return $tipoTanque;
    }

    public function insertarTipoTanque($inputs)
    {
        $tipoTanque = TipoTanque::create($inputs);
        return $tipoTanque;
    }

    public function actualizarTipoTanque($cod, $inputs)
    {
        $tipoTanque = TipoTanque::findOrFail($cod);
        $tipoTanque->fill($inputs);
        $tipoTanque->save();
        return $tipoTanque;
    }
}