<?php

namespace Simplex\Validation\Contracts;

abstract class CompositeValidator implements ValidatorInterface
{
    private $children = [];

    public function addMany(array $children)
    {
        foreach ($children as $child) {
            $this->add($child);
        }
    }

    public function add(ValidatorInterface $child)
    {
        array_push($this->children, $child);
    }

    protected function validateChildren($value)
    {
        foreach ($this->children as $child) {
            $child->validate($value);
        }
    }
}
