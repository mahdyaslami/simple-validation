<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\KeyValueValidator;

class SometimesRule extends KeyValueValidator
{
    public function validate($value)
    {
        if ($this->hasKey($value)) {
            $this->validateChildren($this->getKey($value));
        }
    }
}
