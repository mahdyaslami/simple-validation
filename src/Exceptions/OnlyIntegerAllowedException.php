<?php

namespace Simplex\Validation\Exceptions;

class OnlyIntegerAllowedException extends ValidationException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Value must be integer.', $previous);
    }
}
