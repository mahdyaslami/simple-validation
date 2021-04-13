<?php

namespace Tests\Validation;

use PHPUnit\Framework\TestCase;
use Simplex\Validation\Contracts\KeyValueValidator;
use stdClass;

final class KeyValueValidatorTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\Contracts\KeyValueValidator
     */
    public function check_first_child_rule_of_array()
    {
        $rule = new TestKeyValueRule('id', [new ErrorRule(), new EmtpyRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (\Exception $e) {
            $this->assertEquals('Error.', $e->getMessage());
            $catched = true;
        }

        $this->assertTrue($catched, 'First element of children rule does not checked.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\Contracts\KeyValueValidator
     */
    public function check_second_child_rule_of_array()
    {
        $rule = new TestKeyValueRule('id', [new EmtpyRule(), new ErrorRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (\Exception $e) {
            $this->assertEquals('Error.', $e->getMessage());
            $catched = true;
        }

        $this->assertTrue($catched, 'second element of children rule does not checked.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\Contracts\KeyValueValidator
     */
    public function all_children_rule_of_array()
    {
        $rule = new TestKeyValueRule([new EmtpyRule(), new EmtpyRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (\Exception $e) {
            $catched = true;
        }

        $this->assertFalse($catched, 'error in runnig all children.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\Contracts\KeyValueValidator
     */
    public function check_key_exists_with_std_object()
    {
        $rule = new TestKeyValueRule('id');

        $object = new stdClass();
        $object->id = null;

        $this->assertTrue($rule->hasKey($object), 'Key should exists in std object.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\Contracts\KeyValueValidator
     */
    public function check_key_exists_with_associative_array()
    {
        $rule = new TestKeyValueRule('id');

        $array = [
            'id' => null
        ];

        $this->assertTrue($rule->hasKey($array), 'Key should exists in associative array.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\Contracts\KeyValueValidator
     */
    public function get_key_value_with_std_object()
    {
        $rule = new TestKeyValueRule('id');

        $object = new stdClass();
        $object->id = 'value';

        $this->assertEquals('value', $rule->getKey($object), 'Value is incorrect in std object.');
    }

    /**
     * @test
     * @covers \Simplex\Validation\Contracts\KeyValueValidator
     */
    public function get_key_value_with_associative_array()
    {
        $rule = new TestKeyValueRule('id');

        $array = [
            'id' => 'value'
        ];

        $this->assertEquals('value', $rule->getKey($array), 'Value is incorrect in associative array.');
    }
}

class TestKeyValueRule extends KeyValueValidator
{
    public function validate($value)
    {
        $this->validateChildren($value);
    }

    public function hasKey($value)
    {
        return parent::hasKey($value);
    }

    public function getKey($value)
    {
        return parent::getKey($value);
    }
}
