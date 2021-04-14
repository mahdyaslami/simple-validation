<?php

namespace Simplex\Validation\Contracts;

interface ValidatorInterface
{
    /**
     * Validate a value and throw ValidationException if
     * the value is invalid.
     * 
     * @param mixed $value
     */
    public function validate($value);
}
