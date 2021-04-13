<?php

namespace Tests\Validation;

use Mockery;
use PHPUnit\Framework\TestCase;
use Simplex\Validation\ArrayRule;
use Simplex\Validation\Contracts\KeyValueValidator;

final class ArrayRuleTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\ArrayRule
     */
    public function run_children_for_each_element()
    {
        $keyRule = Mockery::mock(KeyValueValidator::class);
        $keyRule->shouldReceive('validate')->with(1)->times(3);

        $rule = new ArrayRule([
            $keyRule
        ]);

        $array = [
            1, 1, 1
        ];

        $rule->validate($array);

        $this->assertTrue(true);
    }
}
