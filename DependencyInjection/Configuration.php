<?php

/*
 * This file is part of the InfinitytrackingInfinityJavascriptBundle package.
 *
 * (c) Infinitytracking <http://github.com/Infinitytracking/InfinityJavascriptBundle>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Infinitytracking\Bundle\InfinityJavascriptBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Handles configuration information for the bundle
 *
 * @author Chris Sedlmayr <chris.sedlmayr@infinity-tracking.com>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('infinitytracking_infinityjavascript');

        $rootNode
            ->children()
                ->scalarNode('igrp')->isRequired()->cannotBeEmpty()->end()
                ->arrayNode('dgrps')
                    ->prototype('array')
                        ->isRequired()
                        ->requiresAtLeastOneElement()
                        ->children()
                            ->scalarNode('id')->isRequired()->cannotBeEmpty()->end()
                            ->arrayNode('classes')
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode()->isRequired()->requiresAtLeastOneElement()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
