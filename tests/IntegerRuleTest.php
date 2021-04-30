<?php

namespace Tests\Validation;

use PHPUnit\Framework\TestCase;
use Simplex\Validation\Exceptions\NonIntegerException;
use Simplex\Validation\IntegerRule;
use function Simplex\Validation\integer;

final class IntegerRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\IntegerRule
     */
    public function validate_int_return_do_not_throw_any_exception()
    {
        $rule = new IntegerRule();

        $rule->validate(10);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\IntegerRule
     */
    public function validate_non_int_throw_exception_with_message()
    {
        $rule = new IntegerRule();

        $catched = false;
        try {
            $rule->validate('aslami');
        } catch (NonIntegerException $e) {
            $catched = true;
        }

        $this->assertTrue($catched, 'Exception does not thrown for non int value.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\integer
     */
    public function helper_get_integer_rule()
    {
        $this->assertInstanceOf(IntegerRule::class, integer());
    }
}
