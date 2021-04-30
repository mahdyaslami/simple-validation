<?php

namespace Simplex\Validation;

/**
 * Get validator for array with rule or rules
 * 
 * @param array|ValidatorInterface $rule
 * @return ArrayRule
 */
function arrayOf($rule)
{
    if (is_array($rule)) {
        $validator = new ArrayRule($rule);
    } else {
        $validator = new ArrayRule([$rule]);
    }

    return $validator;
}

/**
 * Get validator for integer.
 * 
 * @return IntegerRule
 */
function integer()
{
    return new IntegerRule;
}
