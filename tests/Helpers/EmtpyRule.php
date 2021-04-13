<?php

namespace Tests\Validation\Helpers;

use Simplex\Validation\Contracts\ValidatorInterface;

class EmtpyRule implements ValidatorInterface
{
    public function validate($value)
    {
        //
    }
}
