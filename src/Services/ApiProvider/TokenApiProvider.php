<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\ConfigurationService\Configuration;

class TokenApiProvider
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
        $configuration = new Configuration();

        $configuration->setHost($this->configurationServiceHost);
        $configuration->setApiKey(self::APPLICATION_ID_KEY, $this->applicationId);

        return new TokenApi(null, $configuration);
    }
}
