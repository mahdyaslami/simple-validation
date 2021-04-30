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
 * Get validator for object with rules
 *
 * @param array $rules
 * @return ObjectRule
 */
function objectWith(array $rules = [])
{
    return new ObjectRule($rules);
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

/**
 * Get validator for numeric.
 * 
 * @return NumericRule
 */
function numeric()
{
    return new NumericRule;
}

/**
 * Get validator that check number should be lower than max.
 * 
 * @param float $max
 * @return LowerRule
 */
function lowerThan($max)
{
    return new LowerRule($max);
}
