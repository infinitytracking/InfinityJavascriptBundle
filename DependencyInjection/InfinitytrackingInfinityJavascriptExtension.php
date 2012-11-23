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

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * @author Chris Sedlmayr <chris.sedlmayr@infinity-tracking.com>
 */
class InfinitytrackingInfinityJavascriptExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        // use the defined config to replace parameters in the twig extension

        // we must have an igrp
        if (!isset($config['infinitytracking_infinity_javascript']['igrp'])) {
            throw new \InvalidArgumentException('The "igrp" option must be set under "infinitytracking_infinity_javascript"');
        }

        $container->setParameter(
            'infinitytracking_infinity_javascript.igrp',
            $config['infinitytracking_infinity_javascript']['igrp']
        );

        // dgrps are optional
        if (isset($config['infinitytracking_infinity_javascript']['dgrps'])) {
            $container->setParameter(
                'infinitytracking_infinity_javascript.dgrps',
                $config['infinitytracking_infinity_javascript']['dgrps']
            );
        }

    }
}
