<?php

namespace App\newbles\Repositories;

use App\newbles\Entities\CaptacionAgua;
use App\newbles\Entities\Dispositivo;
use Illuminate\Support\Facades\DB;

class DispositivoRepo
{

    public function listarDispositivos()
    {
        $dispositivos = Dispositivo::where('ESTADO_REGISTRO', 'A')->get();
        return $dispositivos;
    }

    public function consultarDispositivo($cod)
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

    public function captacionAgua($id, $MONTH, $YEAR)
    {
        $array = array();
        $can = "";
        $i = 0;
        $data = DB::select("select SUM(cg.CANTIDAD_CAPTADA) as CANTIDAD_CAPTADA, d.ID_DISPOSITIVO, cg.FECHA_REGISTRO 
                            from dispositivo as d
                            inner join captacion_agua as cg on d.ID_DISPOSITIVO = cg.ID_DISPOSITIVO
                            where d.ID_DISPOSITIVO = $id and d.ESTADO_REGISTRO = 'A' and 
																	MONTH(cg.FECHA_REGISTRO) = $MONTH and YEAR(cg.FECHA_REGISTRO) = $YEAR
														group by cg.FECHA_REGISTRO");
        foreach ($data as $d)
        {
            if($i > 0){
                $can = $can.','.$d->CANTIDAD_CAPTADA;
            }
            else{
                $can = $d->CANTIDAD_CAPTADA;
            }
            $i = $i + 1;
        }
        $array = array('dispositivo' => $id, 'cantidad' => $can);
        return $array;
    }

    public function captacionAguaTodos($MONTH, $YEAR)
    {
        $dispositivos = DB::select("select SUM(cg.CANTIDAD_CAPTADA) as CANTIDAD_CAPTADA, d.ID_DISPOSITIVO, cg.FECHA_REGISTRO 
                                        from dispositivo as d
                                        inner join captacion_agua as cg on d.ID_DISPOSITIVO = cg.ID_DISPOSITIVO
                                        where d.ESTADO_REGISTRO = 'A' and MONTH(cg.FECHA_REGISTRO) = 6 and YEAR(cg.FECHA_REGISTRO) = 2017
                                        group by cg.FECHA_REGISTRO, d.ID_DISPOSITIVO");
        return $dispositivos;
    }

}












































