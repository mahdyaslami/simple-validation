<?php

namespace Simplex\Validation\Contracts;

abstract class CompositeValidator implements ValidatorInterface
{
    private $children = [];

    /**
     * Add array of children to children list.
     * 
     * @param array<ValidatorInterface> $children
     * @return void
     */
    public function addMany(array $children)
    {
        foreach ($children as $child) {
            $this->add($child);
        }
    }

    /**
     * Add a ValidatorInterface child to children list.
     * 
     * @param ValidatorInterface $child
     * @return void
     */
    public function add(ValidatorInterface $child)
    {
        array_push($this->children, $child);
    }

    /**
     * Call validate method of all children with appropriate value.
     * 
     * @param mixed $value
     * @return void
     */
    protected function validateChildren($value)
    {
        foreach ($this->children as $child) {
            $child->validate($value);
        }
    }
}
