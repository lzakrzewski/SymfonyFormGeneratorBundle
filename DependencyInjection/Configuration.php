<?php

namespace Lzakrzewski\SymfonyFormGeneratorBundle\DependencyInjection;

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
                ->arrayNode('property_type_mappings')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('property_type')->end()
                            ->scalarNode('form_type')->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
