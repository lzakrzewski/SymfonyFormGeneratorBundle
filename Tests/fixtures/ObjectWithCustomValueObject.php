<?php

namespace Lzakrzewski\SymfonyFormGeneratorBundle\Tests\fixtures;

class ObjectWithCustomValueObject
{
    /** @var CustomValueObject */
    public $property;

    public function __construct($property)
    {
        $this->property = $property;
    }
}
