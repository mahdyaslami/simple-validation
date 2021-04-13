<?php

namespace Tests\Validation\Exceptions;

use PHPUnit\Framework\TestCase;
use Simplex\Validation\Exceptions\GreaterNumberNotAllowedException;
use Simplex\Validation\Exceptions\OnlyIntegerAllowedException;
use Simplex\Validation\Exceptions\OnlyNumberAllowedException;
use Simplex\Validation\Exceptions\ValidationException;

final class ValidationExceptionTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\Exceptions\ValidationException
     */
    public function get_error_arrays()
    {
        $first = new ValidationException('first');
        $second = new ValidationException('second', $first);

        $errors = $second->errors();

        $this->assertEquals('first', $errors[0]);
        $this->assertEquals('second', $errors[1]);
    }

    /**
     * @test
     * @covers \Simplex\Validation\Exceptions\OnlyNumberAllowedException
     */
    public function only_number_allowed()
    {
        $exception = new OnlyNumberAllowedException();

        $this->assertEquals('Value must be number.', $exception->getMessage());
    }

    /**
     * @test
     * @covers \Simplex\Validation\Exceptions\OnlyIntegerAllowedException
     */
    public function only_integer_allowed()
    {
        $exception = new OnlyIntegerAllowedException();

        $this->assertEquals('Value must be integer.', $exception->getMessage());
    }

    /**
     * @test
     * @covers \Simplex\Validation\Exceptions\GreaterNumberNotAllowedException
     */
    public function greater_number_not_allowed()
    {
        $exception = new GreaterNumberNotAllowedException(10);

        $this->assertEquals('Value must be lower than 10.', $exception->getMessage());
    }
}
