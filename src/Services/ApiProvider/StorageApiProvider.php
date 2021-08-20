<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use VentureLeap\StorageService\Api\FileApi;
use VentureLeap\StorageService\Api\ConfigurationEntryApi;
use VentureLeap\StorageService\Configuration;

class StorageApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'STORAGE';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getFileApi(): FileApi
    {
        return new FileApi(null, $this->getConfiguration());
    }
}
