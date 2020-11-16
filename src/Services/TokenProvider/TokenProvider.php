<?php


namespace VentureLeap\LeapOneGlobalBundle\Services\TokenProvider;


use Symfony\Component\Cache\CacheItem;
use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\ConfigurationService\ApiException;
use VentureLeap\ConfigurationService\Model\Credentials;

class TokenProvider implements TokenProviderInterface
{
    const CACHE_LIFE_TIME = 900;


    /**
     * @var TokenApi
     */
    private $tokenApi;

    public function __construct(TokenApi $tokenApi)
    {
        $this->tokenApi = $tokenApi;
    }


    public function getToken(): string
    {
        $config = $this->tokenApi->getConfig();
        dd($config);

        $cacheItem = $this->cache->getItem('jwt_token');

        if ($cacheItem->isHit() && $this->isCachedTokenValid($cacheItem)) {
            return $cacheItem->get();
        }

        $this->refreshToken($cacheItem, $applicationId, $applicationSecret);

    }

    private function refreshToken(CacheItem $cacheItem, string $applicationId, string $applicationSecret): void
    {
        $credentials = new Credentials([
            'app_id' => $applicationId,
            'app_secret' => $applicationSecret,
        ]);


        try {
            $response = $this->tokenApi->postCredentialsItem($credentials);
        } catch (ApiException $e) {
            $this->logger->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }

        $newToken = $response->getToken();

        $cacheItem->set($newToken);
        $cacheItem->expiresAfter(self::CACHE_LIFE_TIME);

        $this->cache->save($cacheItem);
    }
}