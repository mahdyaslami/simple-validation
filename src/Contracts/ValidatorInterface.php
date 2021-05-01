<?php

namespace Simplex\Validation\Contracts;

interface ValidatorInterface
{
    /**
     * Validate a value and throw ValidationException if
     * the value is invalid.
     * 
     * @param mixed $value
     * @return void
     */
    public function validate($value);
}
