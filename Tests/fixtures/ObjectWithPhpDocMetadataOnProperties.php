<?php

namespace Lzakrzewski\SymfonyFormGeneratorBundle\Tests\fixtures;

use Money\Money;
use Ramsey\Uuid\UuidInterface;

class ObjectWithPhpDocMetadataOnProperties
{
    /** @var \DateTime */
    public $propertyDateTime;
    /** @var UuidInterface */
    public $propertyUuid;
    /** @var Money */
    public $propertyMoney;

    public function __construct($propertyDateTime, $propertyUuid, $propertyMoney)
    {
        $this->propertyDateTime = $propertyDateTime;
        $this->propertyUuid     = $propertyUuid;
        $this->propertyMoney    = $propertyMoney;
    }
}
