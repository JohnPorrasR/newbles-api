<?php

namespace App\newbles\Repositories;

use App\newbles\Entities\Dispositivo;

class DispositivoRepo
{

    public function listarDispositivos()
    {
        $dispositivos = Dispositivo::where('ESTADO_REGISTRO', 'A')->get();
        return $dispositivos;
    }

    public function listarUnDispositivo($cod)
    {
        $dispositivo = Dispositivo::findOrFail($cod);
        return $dispositivo;
    }

    public function insertarDispositivo($inputs)
    {
        $dispositivo = Dispositivo::create($inputs);
        return $dispositivo;
    }

    public function actualizarDispositivo($inputs, $id)
    {
        $dispositivo = Dispositivo::findOrFail($id);
        $dispositivo->fill($inputs);
        $dispositivo->save();
        return $dispositivo;
    }

    public function captacionAgua()
    {
<<<<<<< HEAD
        $data = Dispositivo::with('captacionAgua')->get();
=======
        $data = Dispositivo::with(
                    array('captacionAgua' => function($query){
                        $query->where('ESTADO_REGISTRO', 'A');
                    })
                )->select('ID_DISPOSITIVO')->get();
>>>>>>> 948e156a8370823de96fa7c4159649b70f6b10bd
        return $data;
    }

}