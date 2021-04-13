<?php

namespace Tests\Validation;

use PHPUnit\Framework\TestCase;
use Simplex\Validation\RequiredRule;
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

        try {
            $rule->validate([]);
        } catch (\Throwable $e) {
            $this->assertEquals('id does not exists.', $e->getMessage());
        }
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
}
