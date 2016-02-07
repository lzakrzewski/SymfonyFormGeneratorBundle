<?php

namespace Lzakrzewski\SymfonyFormGeneratorBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FormGeneratorCompiler implements CompilerPassInterface
{
    /** {@inheritdoc} */
    public function process(ContainerBuilder $container)
    {
        $this->registerFormGeneratorExtension($container);
        $this->registerGuessers($container);
        $this->registerCustomPropertyTypes($container);
    }

    private function registerCustomPropertyTypes(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('form_generator.property_type_mapper')) {
            return;
        }

        $mappings = $container->getParameter('symfony_form_generator.property_type_mappings');

        if (empty($mappings)) {
            return;
        }

        $mapper = $container->getDefinition('form_generator.property_type_mapper');

        foreach ($mappings as $mapping) {
            $mapper->addMethodCall('addMapping', [$mapping['property_type'], $mapping['form_type']]);
        }
    }

    private function registerFormGeneratorExtension(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('form.registry')) {
            return;
        }

        $formRegistry = $container->getDefinition('form.registry');
        $extensions   = $formRegistry->getArgument(0);
        $extensions[] = new Reference('form_generator.extension.form_generator');

        $formRegistry->replaceArgument(0, $extensions);
    }

    private function registerGuessers(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('form.registry')) {
            return;
        }

        $chainGuesser = $container->getDefinition('form_generator.guesser.chain');

        foreach ($container->findTaggedServiceIds('form_generator.guesser') as $serviceId => $guesser) {
            $chainGuesser->addMethodCall('add', [new Reference($serviceId), $guesser[0]['priority']]);
        }
    }
}
