<?php

namespace App\newbles\Repositories;


use App\newbles\Entities\TipoBateria;

class TipoBateriaRepo
{

    public function listarTipoBateria()
    {
        $tipoBaterias = TipoBateria::where('ESTADO_REGISTRO', 'A')->get();
        return $tipoBaterias;
    }

    public function consultarTipoBateria($cod)
    {
        $tipoBateria = TipoBateria::findOrFail($cod);
        return $tipoBateria;
    }

    public function insertarTipoBateria($inputs)
    {
        $tipoBateria = TipoBateria::create($inputs);
        return $tipoBateria;
    }

    public function actualizarTipoBateria($inputs, $id)
    {
        $tipoBateria = TipoBateria::findOrFail($id);
        $tipoBateria->fill($inputs);
        $tipoBateria->save();
        return $tipoBateria;
    }

}