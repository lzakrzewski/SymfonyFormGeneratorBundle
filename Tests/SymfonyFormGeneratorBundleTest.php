<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests;

use Lucaszz\SymfonyFormGeneratorBundle\SymfonyFormGeneratorBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SymfonyFormGeneratorBundleTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_exists()
    {
        $bundle = new SymfonyFormGeneratorBundle();

        $this->assertInstanceOf(Bundle::class, $bundle);
    }
}
