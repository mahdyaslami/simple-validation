<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\KeyValueValidator;

class RequiredRule extends KeyValueValidator
{
    public function validate($value)
    {
        if (!$this->keyExists($value)) {
            throw new \Exception("{$this->key} does not exists.");
        }

        $this->validateChildren($this->getValueOfKey($value));
    }
}
