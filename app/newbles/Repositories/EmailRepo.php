<?php
/**
 * Created by PhpStorm.
 * User: LOPP02
 * Date: 20/10/2017
 * Time: 17:25
 */

namespace App\newbles\Repositories;


use App\Mail\Email;
use Illuminate\Support\Facades\Mail;

class EmailRepo
{

    public function envioEmail($to, $name, $mensaje)
    {
        Mail::to($to, $name)->send(new Email($to, $name, $mensaje));
        // return new Email($to, $name, $mensaje);
    }

}