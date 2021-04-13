<?php

namespace Tests\Validation\Helpers;

use Simplex\Validation\Contracts\KeyValueValidator;

class TestKeyValueRule extends KeyValueValidator
{
    public function validate($value)
    {
        $this->validateChildren($value);
    }

    public function hasKey($value)
    {
        return parent::hasKey($value);
    }

    public function getKey($value)
    {
        return parent::getKey($value);
    }
}
