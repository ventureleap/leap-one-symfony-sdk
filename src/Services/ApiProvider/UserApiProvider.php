<?php


namespace VentureLeap\LeapOneGlobalBundle\Services\ApiProvider;


use VentureLeap\UserService\Api\UserApi;
use VentureLeap\UserService\Configuration;

class UserApiProvider
{
    const APPLICATION_ID_KEY = 'ApplicationId';

    /**
     * @var string
     */
    private $userServiceHost;
    /**
     * @var string
     */
    private $applicationId;

    /**
     * @var string
     */
    private $applicationSecret;


    public function __construct(
        string $userServiceHost,
        string $applicationId,
        string $applicationSecret
    ) {
        $this->userServiceHost = $userServiceHost;
        $this->applicationId = $applicationId;
        $this->applicationSecret = $applicationSecret;
    }

    public function getUserApi(): UserApi
    {
        $configuration = new Configuration();

        $configuration->setHost($this->userServiceHost);
        $configuration->setApiKey(self::APPLICATION_ID_KEY, $this->applicationId);

        return new UserApi(null, $configuration);
    }
}
