<?php

namespace Simplex\Validation;

use Simplex\Validation\Exceptions\BigNumberException;

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

        if ($value >= $this->maximum) {
            throw new BigNumberException($this->maximum);
        }
    }
}
