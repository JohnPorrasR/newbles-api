<?php
namespace App\newbles\Repositories;


use App\newbles\Entities\FotoAtrapaniebla;
use Illuminate\Support\Facades\Config;

class FotoAtrapanieblaRepo
{

    public function listarFotoAtrapaniebla()
    {
        $fotoAtrapanieblas = FotoAtrapaniebla::where('ESTADO_REGISTRO', '1')->get();
        return $fotoAtrapanieblas;
    }

    public function consultarFotoAtrapaniebla($cod)
    {
        $fotoAtrapaniebla = FotoAtrapaniebla::findOrFail($cod);
        return $fotoAtrapaniebla;
    }

    public function insertarFotoAtrapaniebla($inputs)
    {
        $fotoAtrapaniebla = FotoAtrapaniebla::create($inputs);
        return $fotoAtrapaniebla;
    }

    public function actualizarFotoAtrapaniebla($cod, $inputs)
    {
        $fotoAtrapaniebla = FotoAtrapaniebla::findOrFail($cod);
        $fotoAtrapaniebla->fill($inputs);
        $fotoAtrapaniebla->save();
        return $fotoAtrapaniebla;
    }

    public function guardarFoto($file)
    {
        $fileName = $file->getClientOriginalName();
        $path = public_path().Config::get('constants.img');
        $res = $file->move($path, $fileName);
        if($res != null or $res != '')
        {
            return $fileName;
        }
        else
        {
            return '';
        }
    }

}