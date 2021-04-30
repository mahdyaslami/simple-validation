<?php

namespace Tests\Validation;

use PHPUnit\Framework\TestCase;
use Simplex\Validation\ObjectRule;
use function Simplex\Validation\objectOf;
use Tests\Validation\Helpers\TestKeyValueRule;

final class ObjectRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\ObjectRule
     */
    public function send_object_to_childrens()
    {
        $keyRule = new TestKeyValueRule('id');
        $rule = new ObjectRule([
            $keyRule
        ]);

        $object = [
            'id' => 4
        ];

        $rule->validate($object);

        $this->assertEquals($object, $keyRule->getLastValue());
    }

    /**
     * @test
     * @covers \Simplex\Validation\objectOf
     */
    public function helper_get_object_rule()
    {
        $keyRule = new TestKeyValueRule('id');
        $rule = objectOf([
            $keyRule
        ]);

        $this->assertInstanceOf(ObjectRule::class, $rule);

        $object = [
            'id' => 4
        ];

        $rule->validate($object);

        $this->assertEquals($object, $keyRule->getLastValue());
    }

    /**
     * @test
     * @covers \Simplex\Validation\objectOf
     */
    public function helper_has_default_value()
    {
        $rule = objectOf();

        $object = [
            'id' => 4
        ];

        $rule->validate($object);

        $this->assertTrue(true);
    }
}
