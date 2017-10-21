<?php

namespace App\newbles\Repositories;

use App\Mail\Email;
use Illuminate\Support\Facades\Mail;

class EmailRepo
{
    protected $personaRepo;

    public function __construct(PersonaRepo $personaRepo)
    {
        $this->personaRepo = $personaRepo;
    }

    public function envioEmail($mensaje, $cod)
    {
        $persona = $this->personaRepo->listarUnPersona($cod);
        Mail::to(strtolower($persona->CORREO), $persona->NOMBRES.''.$persona->APELLIDO_PATERNO.''.$persona->APELLIDO_MATERNO)
                    ->send(new Email($mensaje));
        // return new Email();
    }

}