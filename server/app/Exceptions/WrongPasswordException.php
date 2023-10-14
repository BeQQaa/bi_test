<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class WrongPasswordException extends Exception
{
    public function report()
    {

    }

    public function render(): JsonResponse
    {
        return new JsonResponse(
            ['error' => $this->getMessage()], $this->code);
    }
}
