<?php

namespace Tests\Validation\Helpers;

use Simplex\Validation\Contracts\CompositeValidator;

class TestCompositeRule extends CompositeValidator
{
    public function __construct($rules)
    {
        $this->addMany($rules);
    }

    public function validate($value)
    {
        $this->validateChildren($value);
    }
}
