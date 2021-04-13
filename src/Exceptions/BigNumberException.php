<?php

namespace Simplex\Validation\Exceptions;

class BigNumberException extends ValidationException
{
    public function __construct($maximum, \Throwable $previous = null)
    {
        parent::__construct("Value must be lower than {$maximum}.", $previous);
    }
}
