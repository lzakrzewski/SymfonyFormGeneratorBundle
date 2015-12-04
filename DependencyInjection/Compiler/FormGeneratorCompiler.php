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
        $this->addFormGeneratorExtension($container);
        $this->addVariableTypeMappings($container);
    }

    private function addFormGeneratorExtension(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('form.registry')) {
            return;
        }

        $formRegistry = $container->getDefinition('form.registry');
        $extensions   = $formRegistry->getArgument(0);
        $extensions[] = new Reference('form_generator.extension');

        $formRegistry->replaceArgument(0, $extensions);
    }

    private function addVariableTypeMappings(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('form_generator.variable_type_mapper')) {
            return;
        }

        $mappings =  $container->getParameter('symfony_form_generator.variable_type_mappings');

        if (empty($mappings)) {
            return ;
        }

        $mapper = $container->getDefinition('form_generator.variable_type_mapper');

        foreach ($mappings as $mapping) {
            $mapper->addMethodCall('addMapping', [$mapping['variable_type'], $mapping['form_type']]);
        }
    }
}
