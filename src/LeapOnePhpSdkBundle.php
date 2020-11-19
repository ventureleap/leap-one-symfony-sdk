<?php

namespace VentureLeap\LeapOnePhpSdk;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use VentureLeap\LeapOnePhpSdk\DependencyInjection\Compiler\UserProviderCompilerPass;

class LeapOnePhpSdkBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new UserProviderCompilerPass());
    }

}