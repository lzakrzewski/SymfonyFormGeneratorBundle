<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests\Functional;

use Symfony\Component\Form\FormFactory;

class GeneratorTest extends FunctionalTestCase
{
    /** @test */
    public function ensure_that_form_factory_exists()
    {
        $this->assertInstanceOf(FormFactory::class, $this->container->get('form.factory'));
    }
}
