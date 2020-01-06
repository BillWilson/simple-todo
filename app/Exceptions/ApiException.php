<?php
namespace App\Exceptions;

use Exception;

abstract class ApiException extends Exception
{
    public function render()
    {
        return response([
            'status' => $this->code,
            'message' => $this->getApiExceptionMessage()
        ], $this->code);
    }
    public function getApiExceptionMessage()
    {
        return $this->message;
    }
}
