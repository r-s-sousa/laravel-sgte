<?php

namespace App\Exceptions;

use Exception;

class NotImplementedMethod extends Exception
{
    public function __construct(string $method)
    {
        parent::__construct("Method {$method} is not implemented");
    }
}
