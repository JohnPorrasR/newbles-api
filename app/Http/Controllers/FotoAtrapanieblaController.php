<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\FotoAtrapanieblaRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use phpDocumentor\Reflection\Types\This;

class FotoAtrapanieblaController extends ApiController
{
    protected $fotoAtrapanieblaRepo;

    public function __construct(FotoAtrapanieblaRepo $fotoAtrapanieblaRepo)
    {
        parent::__construct();
        $this->fotoAtrapanieblaRepo = $fotoAtrapanieblaRepo;
    }

    public function index()
    {
        $fotoAtrapanieblas = $this->fotoAtrapanieblaRepo->listarFotoAtrapaniebla();
        return $this->showAll($fotoAtrapanieblas);
    }
    
    public function store(Request $request)
    {
        $file = $request->file('file');
        $ID_ATRAPANIEBLAS = $request->input('ID_ATRAPANIEBLAS');
        $USUARIO_REGISTRO = $request->input('USUARIO_REGISTRO');
        $FECHA_REGISTRO = date("Y-m-d H:i:s");
        $fileName = $this->fotoAtrapanieblaRepo->guardarFoto($file);
        $inputs = [
            'ID_ATRAPANIEBLAS' => $ID_ATRAPANIEBLAS, 'FOTO_RUTA' => Config::get('constants.img').$fileName, 'USUARIO_REGISTRO' => $USUARIO_REGISTRO, 'FECHA_REGISTRO' => $FECHA_REGISTRO
        ];
        if($fileName != '' or $fileName != null)
        {
            $fotoAtrapaniebla = $this->fotoAtrapanieblaRepo->insertarFotoAtrapaniebla($inputs);
            return $this->showOne($fotoAtrapaniebla);
        }
        else
        {
            return $this->errorResponce('Error al guardar la foto');
        }
    }
    
    public function update(Request $request, $cod)
    {
        $ID_ATRAPANIEBLAS = $request->input('ID_ATRAPANIEBLAS');
        $FOTO_RUTA = $request->input('FOTO_RUTA');
        $USUARIO_MODIFICACION = $request->input('USUARIO_CREACION');
        $FECHA_MODIFICACION = date("Y-m-d H:i:s");
        $inputs = [
            'ID_ATRAPANIEBLAS' => $ID_ATRAPANIEBLAS, 'FOTO_RUTA' => $FOTO_RUTA, 'USUARIO_CREACION' => $USUARIO_MODIFICACION, 'FECHA_MODIFICACION' => $FECHA_MODIFICACION
        ];
        $fotoAtrapaniebla = $this->fotoAtrapanieblaRepo->actualizarFotoAtrapaniebla($inputs, $cod);
        return $this->showOne($fotoAtrapaniebla);
    }
    
    public function destroy($cod)
    {
        $inputs = [
            'ESTADO_REGISTRO'=> 'C'
        ];
        $fotoAtrapaniebla = $this->fotoAtrapanieblaRepo->actualizarFotoAtrapaniebla($inputs, $cod);
        return $this->showOne($fotoAtrapaniebla);
    }

}
