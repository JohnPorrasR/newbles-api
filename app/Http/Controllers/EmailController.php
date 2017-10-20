<?php

namespace App\Http\Controllers;

use App\newbles\Repositories\EmailRepo;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    protected $emailRepo;

    public function __construct(EmailRepo $emailRepo)
    {
        $this->emailRepo = $emailRepo;
    }

    public function index()
    {
        $to = "johnporrasr@gmail.com";
        $name = "John Porras R";
        $mensaje = "Se ha realizando un cambio en el estado del atrapanieblas";
        return $this->emailRepo->envioEmail($to, $name, $mensaje);
    }
}
