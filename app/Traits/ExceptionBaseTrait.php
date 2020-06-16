<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionBaseTrait
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param Request
     *
     * @return JsonResponse
     */
    public function render($request)
    {
        return response()->json([
            'error' =>[
                'title' => Response::$statusTexts[$this->statusCode],
                'message' => $this->message,
                'status_code'=> $this->statusCode
            ]
        ], $this->statusCode)
            ->header('Content-Type', 'application/problem+json');
    }
}
