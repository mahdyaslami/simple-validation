<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\ValidatorInterface;
use Simplex\Validation\Exceptions\NonNumericException;

class NumericRule implements ValidatorInterface
{
    public function validate($value)
    {
        if (!is_numeric($value)) {
            throw new NonNumericException();
        }
    }
}
