<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\ValidatorInterface;
use Simplex\Validation\Exceptions\NonIntegerException;

class IntegerRule implements ValidatorInterface
{
    public function validate($value)
    {
        if (!is_int($value)) {
            throw new NonIntegerException();
        }
    }
}
