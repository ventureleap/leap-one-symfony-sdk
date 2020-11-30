<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;

use VentureLeap\UserService\Api\ConfigurationEntryApi;
use VentureLeap\UserService\Api\UserApi;
use VentureLeap\UserService\Configuration;

class UserApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'USER';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getUserApi(): UserApi
    {
        return new UserApi(null, $this->getConfiguration());
    }
}
