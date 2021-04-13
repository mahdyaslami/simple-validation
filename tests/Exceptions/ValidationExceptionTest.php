<?php

namespace Tests\Validation\Exceptions;

use PHPUnit\Framework\TestCase;
use Simplex\Validation\Exceptions\BigNumberException;
use Simplex\Validation\Exceptions\NonIntegerException;
use Simplex\Validation\Exceptions\NonNumericException;
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
     * @covers \Simplex\Validation\Exceptions\NonNumericException
     */
    public function only_number_allowed()
    {
        $exception = new NonNumericException();

        $this->assertEquals('Value isn\'t numeric.', $exception->getMessage());
    }

    /**
     * @test
     * @covers \Simplex\Validation\Exceptions\NonIntegerException
     */
    public function only_integer_allowed()
    {
        $exception = new NonIntegerException();

        $this->assertEquals('Value isn\'t integer.', $exception->getMessage());
    }

    /**
     * @test
     * @covers \Simplex\Validation\Exceptions\BigNumberException
     */
    public function greater_number_not_allowed()
    {
        $exception = new BigNumberException(10);

        $this->assertEquals('Value should be lower than 10.', $exception->getMessage());
    }
}
