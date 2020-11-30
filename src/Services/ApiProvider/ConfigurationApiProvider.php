<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use AutoMapperPlus\AutoMapperPlusBundle\src\Services\ApiProvider\LeapOneApiProvider;
use VentureLeap\ConfigurationService\Api\ConfigurationEntryApi;
use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\ConfigurationService\Configuration;

class ConfigurationApiProvider extends LeapOneApiProvider
{
    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getConfigurationEntryApi(): ConfigurationEntryApi
    {
        return new ConfigurationEntryApi(null, $this->getConfiguration());
    }
}
