<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\User\User;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\User\Account;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\User\Address;
use VentureLeap\StorageService\Api\FileApi;
use VentureLeap\UserService\Api\ConfigurationEntryApi;
use VentureLeap\UserService\Api\SocialAuthenticationApi;
use VentureLeap\UserService\Configuration;

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
