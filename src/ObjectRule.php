<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\CompositeValidator;

class ObjectRule extends CompositeValidator
{
    public function __construct(array $rules = [])
    {
        $this->addMany($rules);
    }

    public function validate($value)
    {
        $this->validateChildren($value);
    }
}
