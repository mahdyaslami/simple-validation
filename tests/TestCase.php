<?php

namespace Tests\Validation;

use Mockery;
use PHPUnit\Framework\TestCase as FrameworkTastCase;
use Simplex\Validation\Contracts\ValidatorInterface;
use Simplex\Validation\Exceptions\ValidationException;

class TestCase extends FrameworkTastCase
{
    public function emptyRule()
    {
        $rule = Mockery::mock(ValidatorInterface::class);

        return $rule;
    }

    public function emptyRuleWithOnceValidateCall()
    {
        $rule = Mockery::mock(ValidatorInterface::class);
        $rule->shouldReceive('validate')->once();

        return $rule;
    }

    public function errorRule()
    {
        $rule = Mockery::mock(ValidatorInterface::class);
        $rule->shouldReceive('validate')->andThrow(new ValidationException());

        return $rule;
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
