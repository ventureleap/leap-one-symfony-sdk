<?php


namespace VentureLeap\LeapOneGlobalBundle\Services\TokenProvider;


use Symfony\Component\Cache\CacheItem;

interface TokenProviderInterface
{
    public function getToken(): string;
}