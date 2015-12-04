<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomValueObjectType extends AbstractType
{
    /** {@inheritdoc} */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new CustomValueObjectToStringTransformer());
    }

    /** {@inheritdoc} */
    public function getParent()
    {
        return 'text';
    }

    /** {@inheritdoc} */
    public function getName()
    {
        return 'custom_value_object';
    }
}
