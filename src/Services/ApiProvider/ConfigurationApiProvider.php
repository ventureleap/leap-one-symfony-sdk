<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use VentureLeap\ConfigurationService\Api\ConfigurationEntryApi;
use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\ConfigurationService\Configuration;

class ConfigurationApiProvider
{
    const APPLICATION_ID_KEY = 'ApplicationId';

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
    private $applicationSecret;


    public function __construct(
        string $configurationServiceHost,
        string $applicationId,
        string $applicationSecret
    ) {
        $this->configurationServiceHost = $configurationServiceHost;
        $this->applicationId = $applicationId;
        $this->applicationSecret = $applicationSecret;
    }

    private function getConfiguration(): Configuration
    {
        $configuration = new Configuration();

        $configuration->setHost($this->configurationServiceHost);
        $configuration->setApiKey(self::APPLICATION_ID_KEY, $this->applicationId);

        return $configuration;
    }


    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    public function getApplicationSecret(): string
    {
        return $this->applicationSecret;
    }

    public function getTokenApi(): TokenApi
    {
        return new TokenApi(null, $this->getConfiguration());
    }

    public function getConfigurationEntryApi(): ConfigurationEntryApi
    {
        return new ConfigurationEntryApi(null, $this->getConfiguration());
    }
}