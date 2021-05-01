<?php

namespace Tests\Validation;

use Mockery;
use PHPUnit\Framework\TestCase as FrameworkTastCase;
use Simplex\Validation\Contracts\CompositeValidator;
use Simplex\Validation\Contracts\ValidatorInterface;
use Simplex\Validation\Exceptions\ValidationException;
use Tests\Validation\Helpers\TestCompositeRule;

class TestCase extends FrameworkTastCase
{
    public function rawMockedRule()
    {
        $rule = Mockery::mock(ValidatorInterface::class);

        return $rule;
    }

    public function receiveValidateRule()
    {
        $rule = Mockery::mock(ValidatorInterface::class);
        $rule->shouldReceive('validate')->once();

        return $rule;
    }

    public function throwExpRule()
    {
        $rule = Mockery::mock(ValidatorInterface::class);
        $rule->shouldReceive('validate')->andThrow(new ValidationException());

        return $rule;
    }

    public function compositeRule($rules)
    {
        return new TestCompositeRule($rules);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
