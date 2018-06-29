<?php

namespace Slince\SchedulingBundle;

use Slince\SchedulingBundle\DependencyInjection\SchedulingExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SchedulingBundle extends Bundle
{

    /**
     * @return string
     */
    public function getContainerExtensionClass()
    {
        return SchedulingExtension::class;
    }
}