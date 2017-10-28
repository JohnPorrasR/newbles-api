<?php

namespace App\newbles\Repositories;


use App\newbles\Entities\Persona;

class PersonaRepo
{

    public function litarPersona()
    {
        $data = Persona::all();
        return $data;
    }

    public function consultarPersona($cod)
    {
        $data = Persona::findOrFail($cod);
        return $data;
    }

    public function insertarPersona($inputs)
    {
        $data = Persona::create($inputs);
        return $data;
    }

    public function actualizarPersona($inputs, $id)
    {
        $data = Persona::findOrFail($id);
        $data->fill($inputs);
        $data->save();
        return $data;
    }
}