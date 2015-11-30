<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\Tests\Functional;

use Lucaszz\SymfonyFormGeneratorBundle\Tests\Functional\app\TestKernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class FunctionalTestCase extends WebTestCase
{
    /** @var ContainerInterface */
    protected $container;

    /** {@inheritdoc} */
    public static function getKernelClass()
    {
        include_once __DIR__.'/app/TestKernel.php';

        return TestKernel::class;
    }

    /** {@inheritdoc} */
    protected function setUp()
    {
        $this->prepareKernel();

        $this->container = static::$kernel->getContainer();
    }

    /** {@inheritdoc} */
    protected function tearDown()
    {
        $this->container = null;

        parent::tearDown();
    }

    private function prepareKernel()
    {
        if (null !== static::$kernel) {
            static::$kernel->shutdown();
        }
        static::$kernel = static::createKernel();
        static::$kernel->boot();
    }
}
