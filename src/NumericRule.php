<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\ValidatorInterface;
use Simplex\Validation\Exceptions\OnlyNumberAllowedException;

class NumericRule implements ValidatorInterface
{
    public function validate($value)
    {
        if (!is_numeric($value)) {
            throw new OnlyNumberAllowedException();
        }
    }
}
