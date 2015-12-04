<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests\Form;

use Lucaszz\SymfonyFormGeneratorBundle\Tests\fixtures\CustomValueObject;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class CustomValueObjectToStringTransformer implements DataTransformerInterface
{
    /** {@inheritdoc} */
    public function transform($value)
    {
        if (null === $value) {
            return '';
        }

        if (!$value instanceof CustomValueObject) {
            throw new TransformationFailedException('Expected a CustomValueObject');
        }

        return (string) $value;
    }

    /** {@inheritdoc} */
    public function reverseTransform($value)
    {
        return CustomValueObject::create($value);
    }
}
