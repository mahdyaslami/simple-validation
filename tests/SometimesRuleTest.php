<?php

namespace Tests\Validation;

use PHPUnit\Framework\TestCase;
use Simplex\Validation\SometimesRule;
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
}
