<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\TokenProvider;


use Symfony\Component\Cache\CacheItem;

interface TokenProviderInterface
{
    public function getToken(): string;

    public function getApplicationId(): string;
}
