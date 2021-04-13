<?php

namespace Simplex\Validation\Exceptions;

class NonNumericException extends ValidationException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Value must be number.', $previous);
    }
}
