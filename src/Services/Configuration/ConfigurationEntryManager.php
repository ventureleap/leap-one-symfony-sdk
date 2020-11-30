<?php


namespace VentureLeap\LeapOnePhpSdk\Services\Configuration;


class ConfigurationEntryManager
{
    private $apis = [];

    public function getConfigurationEntryForKeyAndApi(string $key, string $apiName): string
    {
        /** @var AbstractLeapOneApiProvider $api */
        foreach ($this->apis as $api) {
            if ($apiName === $api->getName()) {
                $api->getConfigurationEntryApi();

            }
        }
    }

    public function saveConfigurationEntryForApi(ConfigurationEntry $configurationEntry): string
    {

    }
}
