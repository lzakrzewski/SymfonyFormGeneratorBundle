<?php

namespace Lucaszz\SymfonyFormGeneratorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /** {@inheritdoc} */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('symfony_form_generator');

        $rootNode
            ->children()
                ->arrayNode('variable_type_mappings')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('variable_type')->end()
                            ->scalarNode('form_type')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
