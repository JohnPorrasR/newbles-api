<?php

namespace App\newbles\Repositories;


use App\newbles\Entities\TipoMalla;

class TipoMallaRepo
{

    public function listarTipoMalla()
    {
        $tipoMallas = TipoMalla::where('ESTADO_REGISTRO', 'A')->get();
        return $tipoMallas;
    }

    public function listarUnTipoMalla($cod)
    {
        $tipoMalla = TipoMalla::findOrFail($cod);
        return $tipoMalla;
    }

    public function insertarTipoMalla($inputs)
    {
        $tipoMalla = TipoMalla::create($inputs);
        return $tipoMalla;
    }

    public function actualizarTipoMalla($cod, $inputs)
    {
        $tipoMalla = TipoMalla::findOrFail($cod);
        $tipoMalla->fill($inputs);
        $tipoMalla->save();
        return $tipoMalla;
    }

}