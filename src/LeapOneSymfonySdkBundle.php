<?php

namespace VentureLeap\LeapOneSymfonySdk;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use VentureLeap\LeapOneSymfonySdk\DependencyInjection\Compiler\UserProviderCompilerPass;

class LeapOneSymfonySdkBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new UserProviderCompilerPass());
    }

}
