<?php

namespace Tests\Validation;

use PHPUnit\Framework\TestCase;
use Tests\Validation\Helpers\EmtpyRule;
use Tests\Validation\Helpers\ErrorRule;
use Tests\Validation\Helpers\TestCompositeRule;

final class CompositeValidatorTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\Contracts\CompositeValidator
     */
    public function check_first_child_rule_of_array()
    {
        $rule = new TestCompositeRule([new ErrorRule(), new EmtpyRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (\Exception $e) {
            $this->assertEquals('Error.', $e->getMessage());
            $catched = true;
        }

        $this->assertTrue($catched, 'First element of children rule does not checked.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\Contracts\CompositeValidator
     */
    public function check_second_child_rule_of_array()
    {
        $rule = new TestCompositeRule([new EmtpyRule(), new ErrorRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (\Exception $e) {
            $this->assertEquals('Error.', $e->getMessage());
            $catched = true;
        }

        $this->assertTrue($catched, 'second element of children rule does not checked.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\Contracts\CompositeValidator
     */
    public function all_children_rule_of_array()
    {
        $rule = new TestCompositeRule([new EmtpyRule(), new EmtpyRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (\Exception $e) {
            $catched = true;
        }

        $this->assertFalse($catched, 'error in runnig all children.');
    }
}
