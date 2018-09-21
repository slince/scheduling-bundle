<?php

/*
 * This file is part of the slince/scheduling-bundle package.
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slince\SchedulingBundle\Scheduling;

interface Scheduable
{
    public function getExpression();
}