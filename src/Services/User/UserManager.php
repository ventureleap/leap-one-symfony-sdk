<?php


namespace VentureLeap\LeapOnePhpSdk\Services\User;


use AutoMapperPlus\AutoMapperInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\User\UserInterface;
use VentureLeap\LeapOnePhpSdk\Model\User\User;
use VentureLeap\UserService\Api\UserApi;
use VentureLeap\UserService\ApiException;
use VentureLeap\UserService\Model\Credentials;
use VentureLeap\UserService\Model\UserJsonldPasswordRequest;
use VentureLeap\UserService\Model\UserJsonldUserRead;
use VentureLeap\UserService\Model\UserJsonldUserWrite;

class UserManager implements UserManagerInterface
{
    /**
     * @var UserApi
     */
    private $userApi;
    /**
     * @var AutoMapperInterface
     */
    private $autoMapper;


    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(UserApi $userApi, AutoMapperInterface $autoMapper, LoggerInterface $logger)
    {
        $this->userApi = $userApi;
        $this->autoMapper = $autoMapper;
        $this->logger = $logger;
    }

    public function registerUser(User $leapOneUser): User
    {
        $leapOneApiUser = $this->autoMapper->map($leapOneUser, UserJsonldUserWrite::class);
        $leapOneApiUserResponse = $this->userApi->postUserCollection(
            $leapOneApiUser
        );
        $leapOneUser->setUuid($leapOneApiUserResponse->getUuid());

        return $leapOneUser;
    }

    public function getUserByUuid(string $uuid): User
    {
        $leapOneApiUser = $this->userApi->getUserItem(
            $uuid
        );

        return $this->autoMapper->map($leapOneApiUser, User::class);
    }

    public function updateUser(User $leapOneUser): User
    {
        $leapOneApiUser = $this->autoMapper->map($leapOneUser, UserJsonldUserWrite::class);
        $leapOneApiUser = $this->userApi->putUserItem($leapOneUser->getUuid(), $leapOneApiUser);

        return $this->autoMapper->map($leapOneApiUser, User::class);
    }

    public function getUserByUsername(string $username): ?User
    {
        $usersForUsername = $this->userApi->getUserCollection($username);
        $leapOneUser = $usersForUsername->getHydramember()[0] ?? null;

        return $this->autoMapper->map($leapOneUser, User::class);
    }

    public function authenticate(array $credentials): ?User
    {

        $credential = new Credentials();
        $credential->setUsername($credentials['username']);
        $credential->setPassword($credentials['password']);
        $credential->setUserType($credentials['userType']);
        try {
            $authResponse = $this->userApi->postCredentialsItem($credential);
        } catch (ApiException $e) {
            return null;
        }

        return $this->autoMapper->map($authResponse, User::class);
    }

    public function isPasswordValid(UserInterface $user, $password): bool
    {
        /**
         * @TODO Here we would have to use a different API,
         * but I suggest we just put it the user API as well.
         * For now, we just return true always :-)
         */
        return true;
    }

    public function requestPasswordReset(User $user): ?User
    {
        $passwordRequest = new UserJsonldPasswordRequest();
        $passwordRequest->setEmail($user->getEmail());

        try {
            $authResponse = $this->userApi->postPasswordRequest($passwordRequest);
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }

        return $this->autoMapper->map($authResponse, User::class);
    }
}