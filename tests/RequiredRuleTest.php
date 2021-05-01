<?php

namespace Tests\Validation;

use Mockery;
use PHPUnit\Framework\TestCase;
use Simplex\Validation\Contracts\ValidatorInterface;
use Simplex\Validation\Exceptions\KeyNotFoundException;
use Simplex\Validation\RequiredRule;
use function Simplex\Validation\required;
use stdClass;

final class RequiredRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\RequiredRule
     */
    public function throw_exception_when_key_does_not_exists()
    {
        $rule = new RequiredRule('id');

        $catched = false;
        try {
            $rule->validate([]);
        } catch (KeyNotFoundException $e) {
            $catched = true;
        }

        $this->assertTrue($catched, 'Does not throw exception when key does not exists.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\RequiredRule
     */
    public function does_not_throw_exception_when_key_exists()
    {
        $rule = new RequiredRule('id');

        $rule->validate([
            'id' => 1
        ]);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\RequiredRule
     */
    public function work_with_std_object()
    {
        $rule = new RequiredRule('id');

        $object = new stdClass();
        $object->id = 1;

        $rule->validate($object);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\required
     */
    public function helper_get_required_rule()
    {
        $rule = required('id');

        $this->assertInstanceOf(RequiredRule::class, $rule);

        $rule->validate([
            'id' => 1
        ]);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\required
     */
    public function helper_get_more_rules()
    {
        $mock = Mockery::mock(ValidatorInterface::class);
        $mock->shouldReceive('validate')->once();
        $rule = required('id', [$mock]);

        $this->assertInstanceOf(RequiredRule::class, $rule);

        $rule->validate([
            'id' => 1
        ]);

        Mockery::close();

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\required
     */
    public function helper_work_with_one_rule()
    {
        $mock = Mockery::mock(ValidatorInterface::class);
        $mock->shouldReceive('validate')->once();
        $rule = required('id', $mock);

        $this->assertInstanceOf(RequiredRule::class, $rule);

        $rule->validate([
            'id' => 1
        ]);

        Mockery::close();

        $this->assertTrue(true);
    }
}
