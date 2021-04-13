<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\CompositeValidator;

class ArrayRule extends CompositeValidator
{
    public function __construct(array $rules = [])
    {
        $this->addMany($rules);
    }

    public function validate($array)
    {
        foreach ($array as $element) {
            $this->validateChildren($element);
        }
    }
}
