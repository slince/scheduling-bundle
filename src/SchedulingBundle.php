<?php

/*
 * This file is part of the slince/scheduling-bundle package.
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slince\SchedulingBundle;

use Slince\SchedulingBundle\DependencyInjection\SchedulingExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SchedulingBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new SchedulingExtension();
        }
        return $this->extension;
    }
}