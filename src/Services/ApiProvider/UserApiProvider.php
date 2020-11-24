<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use VentureLeap\LeapOnePhpSdk\Services\TokenProvider\TokenProvider;
use VentureLeap\UserService\Api\AuthApi;
use VentureLeap\UserService\Api\UserApi;
use VentureLeap\UserService\Configuration;

class UserApiProvider
{
    /**
     * @var string
     */
    private $userServiceHost;

    /**
     * @var TokenProvider
     */
    private $tokenProvider;


    public function __construct(
        string $userServiceHost,
        TokenProvider $tokenProvider
    ) {
        $this->userServiceHost = $userServiceHost;
        $this->tokenProvider = $tokenProvider;
    }

    public function getConfiguration(): Configuration
    {
        $configuration = new Configuration();

        $configuration->setHost($this->userServiceHost);
        $configuration->setApiKey('Authorization', $this->tokenProvider->getToken());
        $configuration->setApiKeyPrefix('Authorization', 'Bearer');

        return $configuration;
    }

    public function getUserApi(): UserApi
    {
        return new UserApi(null, $this->getConfiguration());
    }

    public function getAuthApi(): AuthApi
    {
        return new AuthApi(null, $this->getConfiguration());
    }
}
