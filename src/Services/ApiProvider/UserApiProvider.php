<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;

use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\User\User;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\User\Account;
use VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\Client\User\Address;
use VentureLeap\UserService\Api\ConfigurationEntryApi;
use VentureLeap\UserService\Api\SocialAuthenticationApi;
use VentureLeap\UserService\Configuration;

class UserApiProvider extends AbstractLeapOneApiProvider
{
    const NAME = 'USER';

    protected static $CONFIGURATION_CLASS = Configuration::class;

    protected static $CONFIGURATION_ENTRY_API_CLASS = ConfigurationEntryApi::class;

    public function getUserApi(): User
    {
        return new User(null, $this->getConfiguration());
    }

    public function getSocialAuthenticationApi(): SocialAuthenticationApi
    {
        return new SocialAuthenticationApi(null, $this->getConfiguration());
    }

    public function getAccountApi(): Account
    {
        return new Account(null, $this->getConfiguration());
    }

    public function getAddressApi(): Address
    {
        return new Address(null, $this->getConfiguration());
    }
}
