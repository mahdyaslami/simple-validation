<?php

namespace Tests\Validation\Helpers;

use Simplex\Validation\Contracts\ValidatorInterface;

class ErrorRule implements ValidatorInterface
{
    public function validate($value)
    {
        throw new \Exception('Error.');
    }
}
