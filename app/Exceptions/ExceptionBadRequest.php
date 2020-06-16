<?php

namespace App\Exceptions;

use App\Traits\ExceptionBaseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ExceptionBadRequest extends Exception implements CustomExceptionInterface
{
    use ExceptionBaseTrait;

    public function __construct(string $message)
    {
        $this->message = $message;
        $this->statusCode = Response::HTTP_BAD_REQUEST;
    }
}
