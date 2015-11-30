<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests\Functional;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerTest extends FunctionalTestCase
{
    /** @test */
    public function ensure_that_container_exists()
    {
        $this->assertInstanceOf(ContainerInterface::class, $this->container);
    }
}
