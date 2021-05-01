<?php

namespace Tests\Validation;

use Mockery;
use PHPUnit\Framework\TestCase;
use Simplex\Validation\Contracts\ValidatorInterface;
use Simplex\Validation\SometimesRule;
use function Simplex\Validation\sometimes;
use stdClass;

final class SometimesRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\SometimesRule
     */
    public function does_not_throw_exception_when_key_does_not_exists()
    {
        $rule = new SometimesRule('id');

        $catched = false;
        try {
            $rule->validate([]);
        } catch (\Throwable $e) {
            $catched = true;
        }

        $this->assertFalse($catched, 'Should not throw exception when using sometimes.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\SometimesRule
     */
    public function does_not_throw_exception_when_key_exists()
    {
        $rule = new SometimesRule('id');

        $rule->validate([
            'id' => 1
        ]);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\SometimesRule
     */
    public function work_with_std_object()
    {
        $rule = new SometimesRule('id');

        $object = new stdClass();
        $object->id = 1;

        $rule->validate($object);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\sometimes
     */
    public function helper_get_sometimes_rule()
    {
        $rule = sometimes('id');

        $this->assertInstanceOf(SometimesRule::class, $rule);

        $rule->validate([
            'id' => 1
        ]);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\sometimes
     */
    public function helper_get_more_rules()
    {
        $mock = Mockery::mock(ValidatorInterface::class);
        $mock->shouldReceive('validate')->once();
        $rule = sometimes('id', [$mock]);

        $this->assertInstanceOf(SometimesRule::class, $rule);

        $rule->validate([
            'id' => 1
        ]);

        Mockery::close();

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Simplex\Validation\sometimes
     */
    public function helper_work_with_one_rule()
    {
        $mock = Mockery::mock(ValidatorInterface::class);
        $mock->shouldReceive('validate')->once();
        $rule = sometimes('id', $mock);

        $this->assertInstanceOf(SometimesRule::class, $rule);

        $rule->validate([
            'id' => 1
        ]);

        Mockery::close();

        $this->assertTrue(true);
    }
}
