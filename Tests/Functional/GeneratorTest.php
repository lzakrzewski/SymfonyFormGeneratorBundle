<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests\Functional;

use Lucaszz\SymfonyFormGeneratorBundle\Tests\fixtures\ObjectWithPhpDocMetadataOnProperties;
use Symfony\Component\Form\FormInterface;

class GeneratorTest extends FunctionalTestCase
{
    /** @test */
    public function it_generates()
    {
        $form = $this->container->get('form_generator')->generate(ObjectWithPhpDocMetadataOnProperties::class)->getForm();

        $this->assertInstanceOf(FormInterface::class, $form);
    }
}
