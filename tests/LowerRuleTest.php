<?php

namespace Tests\Validation;

use PHPUnit\Framework\TestCase;
use Simplex\Validation\Exceptions\GreaterNumberNotAllowedException;
use Simplex\Validation\LowerRule;

final class LowerRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\LowerRule
     */
    public function does_not_throw_exception_when_value_is_lower_than_maximum()
    {
        $rule = new LowerRule(10);

        $rule->validate(5);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\LowerRule
     */
    public function does_not_throw_exception_when_value_is_equal_to_maximum()
    {
        $rule = new LowerRule(10);

        $rule->validate(10);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\LowerRule
     */
    public function throw_exception_when_value_is_greater_than_maximum()
    {
        $rule = new LowerRule(10);

        $catched = false;
        try {
            $rule->validate(11);
        } catch (GreaterNumberNotAllowedException $e) {
            $catched = true;
        }

        $this->assertTrue($catched, 'Greater value than maximum not allowed.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\LowerRule
     */
    public function throw_exception_when_value_is_not_number()
    {
        $rule = new LowerRule(10);

        $catched = false;
        try {
            $rule->validate('aslami');
        } catch (\Throwable $e) {
            $catched = true;
        }

        $this->assertTrue($catched, 'None number value not allowed.');
    }
}
