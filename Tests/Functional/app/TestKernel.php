<?php

namespace Lzakrzewski\SymfonyFormGeneratorBundle\Tests\Functional\app;

use Lzakrzewski\SymfonyFormGeneratorBundle\SymfonyFormGeneratorBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    /** {@inheritdoc} */
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new SymfonyFormGeneratorBundle(),
        ];
    }

    /** {@inheritdoc} */
    public function getCacheDir()
    {
        return $this->tmpDir().'/cache';
    }

    /** {@inheritdoc} */
    public function getLogDir()
    {
        return $this->tmpDir().'/logs';
    }

    /** {@inheritdoc} */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config.yml');
    }

    private function tmpDir()
    {
        return sys_get_temp_dir().'/symfony_form_generator_bundle_test';
    }
}
