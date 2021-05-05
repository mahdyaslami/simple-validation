<?php

namespace Simplex\Validation\Exceptions;

class NullValueException extends ValidationException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Value is null.', $previous);
    }
}
