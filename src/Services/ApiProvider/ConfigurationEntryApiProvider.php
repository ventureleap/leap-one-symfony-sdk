<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use VentureLeap\ConfigurationService\Api\ConfigurationEntryApi;
use VentureLeap\UserService\Configuration;

class ConfigurationEntryApiProvider
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
    private $username;
    /**
     * @var string
     */
    private $password;

    public function __construct(
        string $configurationServiceHost,
        string $applicationId
    ) {
        $this->configurationServiceHost = $configurationServiceHost;
        $this->applicationId = $applicationId;
    }

    public function getConfigurationApi(): ConfigurationEntryApi
    {
        $configuration = new Configuration();

        $configuration->setHost($this->configurationServiceHost);
        $configuration->setApiKey(self::APPLICATION_ID_KEY, $this->applicationId);

        return new ConfigurationEntryApi(null, $configuration);
    }
}
