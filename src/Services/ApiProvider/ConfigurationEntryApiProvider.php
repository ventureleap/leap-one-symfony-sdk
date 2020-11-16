<?php


namespace VentureLeap\LeapOneGlobalBundle\Services;


use VentureLeap\ConfigurationService\Api\ConfigurationEntryApi;
use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\UserService\Api\UserApi;
use VentureLeap\UserService\Configuration;

class ConfigurationApiProvider
{
    private const APPLICATION_ID_KEY = 'ApplicationId';

    /**
     * @var string
     */
    private $configurationServiceHost;
    /**
     * @var string
     */
    private $applicationId;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;

    public function __construct(
        string $configurationServiceHost,
        string $applicationId,
        string $username,
        string $password
    ) {
        $this->configurationServiceHost = $configurationServiceHost;
        $this->applicationId = $applicationId;
        $this->username = $username;
        $this->password = $password;
    }

    public function getConfigurationApi(): ConfigurationEntryApi
    {
        $configuration = new Configuration();

        $configuration->setHost($this->configurationServiceHost);
        $configuration->setApiKey(self::APPLICATION_ID_KEY, $this->applicationId);
        $configuration->setUsername($this->username);
        $configuration->setPassword($this->password);

        return new ConfigurationEntryApi(null, $configuration);
    }


    public function getToken(string $applicationId, string $applicationSecret): string
    {
        $cacheItem = $this->cache->getItem('jwt_token');

        if ($cacheItem->isHit() && $this->isCachedTokenValid($cacheItem)) {
            return $cacheItem->get();
        }

        $this->refreshToken($cacheItem, $applicationId, $applicationSecret);

        return $cacheItem->get();
    }

    protected function getTokenApi(): TokenApi
    {
        return new TokenApi(null, $this->getConfiguration());
    }

    protected function isCachedTokenValid(CacheItem $cacheItem): bool
    {

    }
}
