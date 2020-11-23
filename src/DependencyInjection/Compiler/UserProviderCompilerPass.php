<?php


namespace VentureLeap\LeapOnePhpSdk\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use VentureLeap\LeapOnePhpSdk\DependencyInjection\Configuration;

class UserProviderCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $definitions = $container->findTaggedServiceIds('leap_one.login_form_authenticators');

        foreach ($definitions as $definitionKey => $definitionValue) {
            $definition = $container->getDefinition($definitionKey);

            if(isset($definition->getArguments()['$routeAfterLogin']) === false) {
                $definition->setArgument('$routeAfterLogin', $container->getParameter('leap_one_sdk_route_after_login'));
            }
        }
    }
}