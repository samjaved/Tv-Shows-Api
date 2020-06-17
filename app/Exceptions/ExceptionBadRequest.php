<?php

namespace App\Exceptions;

use App\Traits\ExceptionBaseTrait;
use Exception;
use Illuminate\Http\Response;


class ExceptionBadRequest extends Exception implements CustomExceptionInterface
{
    use ExceptionBaseTrait;

    /**
     * ExceptionBadRequest constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
        $this->statusCode = Response::HTTP_BAD_REQUEST;
    }
}
