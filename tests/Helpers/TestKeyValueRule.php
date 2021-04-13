<?php

namespace Tests\Validation\Helpers;

use Simplex\Validation\Contracts\KeyValueValidator;

class TestKeyValueRule extends KeyValueValidator
{
    protected $value;

    public function validate($value)
    {
        $this->value = $value;

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

    public function getLastValue()
    {
        return $this->value;
    }
}
