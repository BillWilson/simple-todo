<?php

namespace App\Exceptions;

trait DontReport
{
    public function report(): void
    {
    }
}
