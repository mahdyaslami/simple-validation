<?php

namespace Simplex\Validation\Contracts;

use Simplex\Validation\Contracts\CompositeValidator;

abstract class KeyValueValidator extends CompositeValidator
{
    protected $key;

    public function __construct($key, array $rules = [])
    {
        $this->key = $key;

        $this->addMany($rules);
    }

    protected function hasKey($value)
    {
        return is_object($value) ?
            property_exists($value, $this->key)
            : array_key_exists($this->key, $value);
    }

    protected function getKey($value)
    {
        return is_object($value) ?
            $value->{$this->key}
            : $value[$this->key];
    }
}
