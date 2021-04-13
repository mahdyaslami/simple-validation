<?php

namespace Simplex\Validation;

use Simplex\Validation\Exceptions\LowerNumberAllowedException;

class LowerRule extends NumericRule
{
    private $maximum;

    public function __construct($maximum)
    {
        $this->maximum = $maximum;
    }

    public function validate($value)
    {
        parent::validate($value);

        if ($value > $this->maximum) {
            throw new LowerNumberAllowedException($this->maximum);
        }
    }
}
