<?php

namespace Tests\Validation;

use Simplex\Validation\Exceptions\ValidationException;
use stdClass;
use Tests\Validation\Helpers\TestKeyValueRule;

final class KeyValueValidatorTest extends TestCase
{
    /**
     * @test
     * @covers \Simplex\Validation\Contracts\KeyValueValidator
     */
    public function check_first_child_rule_of_array()
    {
        $rule = new TestKeyValueRule('id', [$this->errorRule(), $this->blankRuleWithoutCheckingReceiveValidate()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (ValidationException $e) {
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
        $rule = new TestKeyValueRule('id', [$this->blankRuleThatCheckValidate(), $this->errorRule()]);

        $catched = false;
        try {
            $rule->validate(0);
        } catch (ValidationException $e) {
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
        $rule = new TestKeyValueRule('id', [$this->blankRuleThatCheckValidate(), $this->blankRuleThatCheckValidate()]);

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
