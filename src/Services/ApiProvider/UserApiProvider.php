<?php


namespace VentureLeap\LeapOnePhpSdk\Services\ApiProvider;


use VentureLeap\LeapOnePhpSdk\Services\TokenProvider\TokenProvider;
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

    public function getUserApi(): UserApi
    {
        $configuration = new Configuration();

        $configuration->setHost($this->userServiceHost);
        $configuration->setApiKey('Authorization', $this->tokenProvider->getToken());
        $configuration->setApiKeyPrefix('Authorization', 'Bearer');

        return new UserApi(null, $configuration);
    }
}
