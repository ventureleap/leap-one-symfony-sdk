<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;

use VentureLeap\UserService\Api\AccountApi;
use VentureLeap\UserService\Api\AddressApi;
use VentureLeap\UserService\Api\ConfigurationEntryApi;
use VentureLeap\UserService\Api\SocialAuthenticationApi;
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

    public function getSocialAuthenticationApi(): SocialAuthenticationApi
    {
        return new SocialAuthenticationApi(null, $this->getConfiguration());
    }

    public function getAccountApi(): AccountApi
    {
        return new AccountApi(null, $this->getConfiguration());
    }

    public function getAddressApi(): AddressApi
    {
        return new AddressApi(null, $this->getConfiguration());
    }
}
