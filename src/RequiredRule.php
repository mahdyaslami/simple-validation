<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\KeyValueValidator;
use Simplex\Validation\Exceptions\KeyNotFoundException;

class RequiredRule extends KeyValueValidator
{
    public function validate($value)
    {
        if (!$this->hasKey($value)) {
            throw new KeyNotFoundException($this->key);
        }

        $this->validateChildren($this->getKey($value));
    }
}
