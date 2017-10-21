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
        $cod = 1;
        $mensaje = "Se ha realizando un cambio en el estado del atrapanieblas";
        $this->emailRepo->envioEmail($mensaje, $cod);
    }
}
