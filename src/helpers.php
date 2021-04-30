<?php

namespace Simplex\Validation;

use Simplex\Validation\Contracts\ValidatorInterface;

/**
 * Get validator for array with rule or rules
 * 
 * @param array|ValidatorInterface $rule
 * @return ArrayRule
 */
function arrayOf($rule = [])
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
function objectOf(array $rules = [])
{
    return new ObjectRule($rules);
}

/**
 * Get validator for required key with rule or rules.
 *
 * @param string $key
 * @param array|ValidatorInterface $rules
 * @return RequiredRule
 */
function required(string $key, $rule = [])
{
    if (is_array($rule)) {
        $validator = new RequiredRule($key, $rule);
    } else {
        $validator = new RequiredRule($key, [$rule]);
    }

    return $validator;
}

/**
 * Get validator for sometimes key with rule or rules.
 *
 * @param string $key
 * @param array|ValidatorInterface $rules
 * @return SometimesRule
 */
function sometimes(string $key, $rule = [])
{
    if (is_array($rule)) {
        $validator = new SometimesRule($key, $rule);
    } else {
        $validator = new SometimesRule($key, [$rule]);
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
