<?php

namespace Tests\Validation;

use Exception;
use PHPUnit\Framework\TestCase;
use Simplex\Validation\Contracts\CompositeValidator;
use Simplex\Validation\Contracts\ValidatorInterface;

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

class TestCompositeRule extends CompositeValidator
{
    public function __construct($rules)
    {
        $this->addMany($rules);
    }

    public function validate($value)
    {
        $this->validateChildren($value);
    }
}

class EmtpyRule  implements ValidatorInterface
{
    public function validate($value)
    {
        //
    }
}

class ErrorRule  implements ValidatorInterface
{
    public function validate($value)
    {
        throw new Exception('Error.');
    }
}
