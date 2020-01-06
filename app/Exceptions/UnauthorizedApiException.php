<?php

namespace App\Exceptions;

class UnauthorizedApiException extends ApiException
{
    use DontReport;

    protected $code = 401;
}
