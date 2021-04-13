<?php

namespace Simplex\Validation\Exceptions;

class NonIntegerException extends ValidationException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Value must be integer.', $previous);
    }
}
