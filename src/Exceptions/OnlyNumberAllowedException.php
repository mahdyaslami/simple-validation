<?php

namespace Simplex\Validation\Exceptions;

class OnlyNumberAllowedException extends ValidationException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Value must be number.', $previous);
    }
}
