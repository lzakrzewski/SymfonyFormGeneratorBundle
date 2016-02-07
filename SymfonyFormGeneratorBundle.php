<?php

namespace Lzakrzewski\SymfonyFormGeneratorBundle;

use Lzakrzewski\SymfonyFormGeneratorBundle\DependencyInjection\Compiler\FormGeneratorCompiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SymfonyFormGeneratorBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new FormGeneratorCompiler());
    }
}
