<?php


namespace VentureLeap\LeapOneSymfonySdk\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    const ROUTE_AFTER_LOGIN_KEY = 'route_after_login';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('leap_one_php_sdk');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->variableNode(static::ROUTE_AFTER_LOGIN_KEY)->defaultValue('account_profile_show')->end()
            ->end();

        return $treeBuilder;
    }
}
