<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests\fixtures;

class ObjectWithoutMetadata
{
    public $property;

    public function __construct($property)
    {
        $this->property = $property;
    }
}
