<?php

namespace Tests\Validation;

use PHPUnit\Framework\TestCase;
use Simplex\Validation\Exceptions\OnlyNumberAllowedException;
use Simplex\Validation\NumericRule;

final class NumericRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\NumericRule
     */
    public function throw_exception_when_value_is_not_number()
    {
        $rule = new NumericRule();

        $catched = false;
        try {
            $rule->validate('non-numeric');
        } catch (OnlyNumberAllowedException $e) {
            $catched = true;
        }

        $this->assertTrue($catched, 'None number value not allowed.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\NumericRule
     */
    public function work_with_float()
    {
        $rule = new NumericRule();

        $catched = false;
        try {
            $rule->validate(10.5);
        } catch (OnlyNumberAllowedException $e) {
            $catched = true;
        }

        $this->assertFalse($catched, 'Float should allowed.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\NumericRule
     */
    public function work_with_int()
    {
        $rule = new NumericRule();

        $catched = false;
        try {
            $rule->validate(10);
        } catch (OnlyNumberAllowedException $e) {
            $catched = true;
        }

        $this->assertFalse($catched, 'Int should allowed.');
    }
}
