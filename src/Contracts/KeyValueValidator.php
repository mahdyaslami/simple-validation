<?php

namespace Simplex\Validation\Contracts;

use Simplex\Validation\Contracts\CompositeValidator;

abstract class KeyValueValidator extends CompositeValidator
{
    protected $key;

    /**
     * Create instance of KeyValudValidator.
     * 
     * Its necessary to know what key you want to validate.
     * and what is your rule for its value.
     * 
     * @param string $key
     */
    public function __construct(string $key, array $rules = [])
    {
        $this->key = $key;

        $this->addMany($rules);
    }

    /**
     * Check if key exists.
     * 
     * work for both associative array or stdObject.
     * 
     * @param array|object $value
     * @return bool
     */
    protected function hasKey($value): bool
    {
        return is_object($value) ?
            property_exists($value, $this->key)
            : array_key_exists($this->key, $value);
    }

    /**
     * Get value of existing key.
     * 
     * work for both associative array or stdObject.
     * 
     * @param array|object $value
     * @return mixed
     */
    protected function getKey($value)
    {
        return is_object($value) ?
            $value->{$this->key}
            : $value[$this->key];
    }
}
