<?php

declare(strict_types=1);

namespace Kosmos\MustacheBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('mustache');
        $rootNode = $treeBuilder->getRootNode();

        $this->addMustacheOptions($rootNode);

        return $treeBuilder;
    }
    private function addMustacheOptions(ArrayNodeDefinition $rootNode): void
    {
        $rootNode
            ->children()
            ->scalarNode('cache')->defaultValue('%kernel.cache_dir%/mustache')->end()
            ->scalarNode('loader_id')->defaultValue('mustache.loader')->end()
            ->scalarNode('partials_loader_id')->defaultValue('mustache.loader')->end()
            ->scalarNode('charset')->defaultValue('%kernel.charset%')->end()
            ->arrayNode('pragmas')
            ->prototype('scalar')->end()
            ->end()
            ->end()
        ;
    }
}
