<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\TokenProvider;


use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Cache\CacheItem;
use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\ConfigurationService\ApiException;
use VentureLeap\ConfigurationService\Model\Credentials;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\ConfigurationApiProvider;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\LeapOneConnectionCredentialsProviderInterface;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\TokenApiProvider;

class TokenProvider implements TokenProviderInterface
{
    const CACHE_LIFE_TIME = 900;

    /**
     * @var AdapterInterface
     */
    private $cache;
    /**
     * @var LoggerInterface
     */
    private $logger;
    private TokenApiProvider $tokenApiProvider;
    private LeapOneConnectionCredentialsProviderInterface $leapOneConnectionCredentialsProvider;

    public function __construct(
        AdapterInterface $cache,
        LoggerInterface $logger,
        TokenApiProvider $tokenApiProvider,
        LeapOneConnectionCredentialsProviderInterface $leapOneConnectionCredentialsProvider
    ) {
        $this->cache = $cache;
        $this->logger = $logger;
        $this->tokenApiProvider = $tokenApiProvider;
        $this->leapOneConnectionCredentialsProvider = $leapOneConnectionCredentialsProvider;
    }

    public function getApplicationId(): string
    {
        return $this->leapOneConnectionCredentialsProvider->getApplicationId();
    }

    public function getToken(): string
    {
        if (empty($this->getApplicationId())) {
            return 'no_token';
        }

        $cacheItem = $this->cache->getItem($this->getItemKey());

        if ($cacheItem->isHit() && $this->isCachedTokenValid($cacheItem->get())) {
            return $cacheItem->get();
        }

        return $this->refreshToken(
            $cacheItem
        );
    }

    public function updateCredentials(string $applicationId, string $applicationSecret): void
    {
        $this->cache->deleteItem($this->getItemKey());
    }

    private function isCachedTokenValid(?string $token): bool
    {
        if (null === $token) {
            return false;
        }

        $tokenParts = explode('.', $token);
        $decode = json_decode(base64_decode($tokenParts[1]), true);

        $timestamp = time() + (60 * 3); // timestamp with three minutes buffer;

        if ($timestamp > $decode['exp']) {
            return false;
        }

        return true;
    }

    private function refreshToken(CacheItem $cacheItem): string
    {
        $credentials = new Credentials(
            [
                'app_id' => $this->leapOneConnectionCredentialsProvider->getApplicationId(),
                'app_secret' => $this->leapOneConnectionCredentialsProvider->getApplicationSecret(),
            ]
        );

        try {
            $response = $this->tokenApiProvider->getTokenApi()->postCredentialsItem($credentials);
        } catch (ApiException $e) {
            $this->logger->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }

        $newToken = $response->getToken();

        $cacheItem->set($newToken);
        $cacheItem->expiresAfter(self::CACHE_LIFE_TIME);

        $this->cache->save($cacheItem);

        return $newToken;
    }

    private function getItemKey(): string
    {
        return 'jwt_token_' . $this->leapOneConnectionCredentialsProvider->getApplicationId();
    }
}
