<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FormGeneratorCompiler implements CompilerPassInterface
{
    /** {@inheritdoc} */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('form.registry')) {
            return;
        }

        $formRegistry = $container->getDefinition('form.registry');
        $extensions   = $formRegistry->getArgument(0);
        $extensions[] = new Reference('form_generator.extension');

        $formRegistry->replaceArgument(0, $extensions);
    }
}
