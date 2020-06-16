<?php


namespace App\Exceptions;

interface CustomExceptionInterface
{
    public function report();
    public function render($request);
}
