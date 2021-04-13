<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\ValidatorInterface;
use Simplex\Validation\Exceptions\OnlyIntegerAllowedException;

class IntegerRule implements ValidatorInterface
{
    public function validate($value)
    {
        if (!is_int($value)) {
            throw new OnlyIntegerAllowedException();
        }
    }
}
