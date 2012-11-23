<?php

/*
 * This file is part of the InfinityTrackingInfinityJavascriptBundle package.
 *
 * (c) InfinityTracking <http://github.com/InfinityTracking/InfinityJavascriptBundle>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace InfinityTracking\Bundle\InfinityJavascriptBundle\Twig;

/**
 * Twig Extension that makes key variables available to all twig templates
 *
 * @author Chris Sedlmayr <chris.sedlmayr@infinity-tracking.com>
 */
class InfinityTrackingJavascriptVariableExtension extends Twig_Extension
{
    protected $igrp;
    protected $dgrps;

    public function __construct($igrp, array $dgrps = array())
    {
        $this->igrp     = $igrp;
        $this->dgrps    = $dgrps;
    }

    public function getGlobals()
    {
        return array(
            'infinitytracking_infinityjavascript.igrp'  => $igrp,
            'infinitytracking_infinityjavascript.dgrps' => $dgrps
        );
    }

    public function getName()
    {
        return 'infinitytracking_infinityjavascript.javascript_variable_extension';
    }
}
