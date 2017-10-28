<?php

namespace App\newbles\Repositories;


use App\newbles\Entities\Atrapaniebla;

class AtrapanieblaRepo
{

    public function listarAprataniebla()
    {
        $Atrapaniebla = Atrapaniebla::where('ESTADO_REGISTRO', 'A')->get();
        return $Atrapaniebla;
    }

    public function consultarprataniebla($cod)
    {
        $Atrapaniebla = Atrapaniebla::where('ESTADO_REGISTRO', 'A')->where('ID_ATRAPANIEBLAS', $cod)->get();
        return $Atrapaniebla;
    }

    public function insertarAprataniebla($inputs)
    {
        $Atrapaniebla = Atrapaniebla::create($inputs);
        return $Atrapaniebla;
    }

    public function actualizarAprataniebla($inputs, $id)
    {
        $Atrapaniebla = Atrapaniebla::findOrFail($id);
        $Atrapaniebla->fill($inputs);
        $Atrapaniebla->save();
        return $Atrapaniebla;
    }

    public function listarAtrapanieblasPendientes()
    {
        $Atrapaniebla = Atrapaniebla::where('ESTADO_REGISTRO', 'P')->get();
        return $Atrapaniebla;
    }

    public function googleMaps()
    {
        $Atrapaniebla = Atrapaniebla::where('ESTADO_REGISTRO', 'A')->select('ID_ATRAPANIEBLAS','LONGITUD','LATITUD')->get();
        return $Atrapaniebla;
    }

}