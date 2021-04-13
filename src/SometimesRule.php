<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\KeyValueValidator;

class SometimesRule extends KeyValueValidator
{
    public function validate($value)
    {
        if ($this->keyExists($value)) {
            $this->validateChildren($this->getValueOfKey($value));
        }
    }
}
