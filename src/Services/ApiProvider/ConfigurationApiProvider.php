<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;

use VentureLeap\ConfigurationService\Api\ConfigurationEntryApi;
use VentureLeap\ConfigurationService\Api\TokenApi;
use VentureLeap\ConfigurationService\Configuration;
use VentureLeap\ConfigurationService\Model\ConfigurationEntryJsonldConfigurationRead;
use VentureLeap\ConfigurationService\Model\ConfigurationEntryJsonldConfigurationWrite;
use VentureLeap\LeapOnePhpSdk\Model\Configuration\ConfigurationEntry;

class ConfigurationApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'CONFIGURATION';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getTokenApi(): TokenApi
    {
        return new TokenApi(null, $this->getConfiguration());
    }

    public function setConfigurationEntry(ConfigurationEntry $configurationEntry): void
    {
        /** @var ConfigurationEntryApi $configurationEntryApi */
        $configurationEntryApi = $this->getConfigurationEntryApi();

        $leapOneConfigurationEntry = new ConfigurationEntryJsonldConfigurationWrite();
        $leapOneConfigurationEntry->setKey($configurationEntry->getKey());
        $leapOneConfigurationEntry->setSubKey($configurationEntry->getSubKey());
        $leapOneConfigurationEntry->setValue($configurationEntry->getValue());
        $leapOneConfigurationEntry->setApplicationId($this->tokenProvider->getApplicationId());

        if (false === empty($configurationEntry->getUuid())) {
            $configurationEntryApi->putConfigurationEntryItem(
                $configurationEntry->getUuid(),
                $leapOneConfigurationEntry
            );
        } else {
            $configurationEntryApi->postConfigurationEntryCollection(
                $leapOneConfigurationEntry
            );
        }
    }

    public function getConfigurationEntry(string $key, ?string $subKey): ConfigurationEntry
    {
        $configurationEntry = new ConfigurationEntry();
        $configurationEntry->setKey($key);
        $configurationEntry->setSubKey($subKey);

        /** @var ConfigurationEntryApi $configurationEntryApi */
        $configurationEntryApi = $this->getConfigurationEntryApi();

        /** subKey filter has not yet been provided. */
        $response = $configurationEntryApi->getConfigurationEntryCollection($key);

        if (0 === $response->getHydratotalItems()) {
            return $configurationEntry;
        }
        /** @var ConfigurationEntryJsonldConfigurationRead $leapOneConfigurationEntry */
        $leapOneConfigurationEntry = $response->offsetGet(0);

        $configurationEntry->setUuid($leapOneConfigurationEntry->getUuid());
        $configurationEntry->setValue($leapOneConfigurationEntry->getValue());

        return $configurationEntry;
    }
}
