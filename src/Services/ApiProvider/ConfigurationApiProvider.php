<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;

use VentureLeap\ConfigurationService\Api\ConfigurationEntryApi;
use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\ConfigurationService\Configuration;

class ConfigurationApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'CONFIGURATION';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getTokenApi(): TokenApi
    {
        return new TokenApi(null, $this->getConfiguration());
    }

    protected function getConfiguration(): Configuration
    {
        $configuration = new Configuration();

        $configuration->setHost($this->endpoint);
        $configuration->setApiKey(self::APPLICATION_ID_KEY, $this->applicationId);

        return $configuration;
    }
}
