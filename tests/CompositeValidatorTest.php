<?php

namespace Tests\Validation;

use Simplex\Validation\Exceptions\ValidationException;
use Tests\Validation\Helpers\TestCompositeRule;

final class CompositeValidatorTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\Contracts\CompositeValidator
     */
    public function check_first_child_rule_of_array()
    {
        $rule = $this->compositeRule([$this->throwExpRule(), $this->rawMockedRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (ValidationException $e) {
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
        $rule = $this->compositeRule([$this->receiveValidateRule(), $this->throwExpRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (ValidationException $e) {
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
        $rule = $this->compositeRule([$this->receiveValidateRule(), $this->receiveValidateRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (\Exception $e) {
            $catched = true;
        }

        $this->assertFalse($catched, 'error in runnig all children.');
    }
}
