<?php

namespace JP\DiceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Class Configuration.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jpc_dice');

        $rootNode
            ->children()
                ->arrayNode('dices')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('faces')
                                ->isRequired()
                            ->end()
                            ->scalarNode('load')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
