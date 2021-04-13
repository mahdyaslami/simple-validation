<?php

namespace Simplex\Validation\Exceptions;

class KeyNotFoundException extends ValidationException
{
    public function __construct($key, \Throwable $previous = null)
    {
        parent::__construct("{$key} not found.", $previous);
    }
}
