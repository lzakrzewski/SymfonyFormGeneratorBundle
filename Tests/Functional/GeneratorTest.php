<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests\Functional;

use Lucaszz\SymfonyFormGeneratorBundle\Tests\fixtures\ObjectWithoutMetadata;
use Symfony\Component\Form\FormInterface;

class GeneratorTest extends FunctionalTestCase
{
    /** @test */
    public function it_generates()
    {
        $form = $this->container->get('form_generator')->generate(ObjectWithoutMetadata::class)->getForm();

        $this->assertInstanceOf(FormInterface::class, $form);
    }
}
