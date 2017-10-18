<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponser
{
    private function successResponce($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponce($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        return $this->successResponce(['data' => $collection], $code);
    }

    protected function showOne(Model $instance, $code = 200)
    {
        return $this->successResponce(['data' => $instance], $code);
    }

    protected function showArray($array, $code = 200)
    {
        return $this->successResponce(['data' => $array], $code);
    }

}