<?php


namespace VentureLeap\LeapOneGlobalBundle\Services;


use VentureLeap\UserService\Api\UserApi;
use VentureLeap\UserService\Configuration;

class UserApiProvider
{
    private const APPLICATION_ID_KEY = 'ApplicationId';

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
    private $username;
    /**
     * @var string
     */
    private $password;

    public function __construct(
        string $userServiceHost,
        string $applicationId,
        string $username,
        string $password
    ) {
        $this->userServiceHost = $userServiceHost;
        $this->applicationId = $applicationId;
        $this->username = $username;
        $this->password = $password;
    }

    public function getUserApi(): UserApi
    {
        $configuration = new Configuration();

        $configuration->setHost($this->userServiceHost);
        $configuration->setApiKey(self::APPLICATION_ID_KEY, $this->applicationId);
        $configuration->setUsername($this->username);
        $configuration->setPassword($this->password);

        return new UserApi(null, $configuration);
    }
}
