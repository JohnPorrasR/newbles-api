<?php
/**
 * Created by PhpStorm.
 * User: Computer
 * Date: 12/9/2017
 * Time: 12:37
 */

namespace App\newbles\Repositories;


use App\newbles\Entities\TipoDisenio;

class TipoDisenioRepo
{

    public function listarTipoDisenio()
    {
        $tipoDisenio = TipoDisenio::where('ESTADO_REGISTRO', '1')->get();
        return $tipoDisenio;
    }

    public function listarUnTipoDisenio($cod)
    {
        $tipoDisenio = TipoDisenio::findOrFail($cod);
        return $tipoDisenio;
    }

    public function insertarTipoDisenio($inputs)
    {
        $tipoDisenio = TipoDisenio::create($inputs);
        return $tipoDisenio;
    }

    public function actualizarTipoDisenio($cod, $inputs)
    {
        $tipoDisenio = TipoDisenio::findOrFail($cod);
        $tipoDisenio->fill($inputs);
        $tipoDisenio->save();
        return $tipoDisenio;
    }

}