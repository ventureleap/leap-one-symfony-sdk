<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\User;


use AutoMapperPlus\AutoMapperInterface;
use VentureLeap\LeapOneSymfonySdk\Model\MFA\MFACode;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\User\UserInterface;
use VentureLeap\LeapOneSymfonySdk\Model\User\User;
use VentureLeap\LeapOneSymfonySdk\Model\User\UserFilter;
use VentureLeap\LeapOneSymfonySdk\Model\Util\Paginator;
use VentureLeap\UserService\Api\SocialAuthenticationApi;
use VentureLeap\UserService\Api\UserApi;
use VentureLeap\UserService\ApiException;
use VentureLeap\UserService\Model\Credentials;
use VentureLeap\UserService\Model\UserJsonldMfaCheck;
use VentureLeap\UserService\Model\UserJsonldMfaSms;
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

    /**
     * @var SocialAuthenticationApi
     */
    private SocialAuthenticationApi $socialAuthenticationApi;

    public function __construct(UserApi $userApi, SocialAuthenticationApi $socialAuthenticationApi, AutoMapperInterface $autoMapper, LoggerInterface $logger)
    {
        $this->userApi = $userApi;
        $this->autoMapper = $autoMapper;
        $this->logger = $logger;
        $this->socialAuthenticationApi = $socialAuthenticationApi;
    }

    public function registerUser(User $leapOneUser): User
    {
        $leapOneApiUser = $this->autoMapper->map($leapOneUser, UserJsonldUserWrite::class);
        try {
            $leapOneApiUserResponse = $this->userApi->postUserCollection(
                $leapOneApiUser
            );
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }
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
        try {
            $leapOneApiUser = $this->userApi->putUserItem($leapOneUser->getUuid(), $leapOneApiUser);
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }

        return $this->autoMapper->map($leapOneApiUser, User::class);
    }

    public function getUserByUsername(string $username, bool $isExactMatch = false): ?User
    {
        try {
            $usersForUsername = $this->userApi->getUserCollection($username);
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }

        if ($isExactMatch){
            $leapOneUser = array_filter($usersForUsername->getHydramember(), function (UserJsonldUserRead $user) use ($username){
                return $user->getUsername() === $username;
            }, ARRAY_FILTER_USE_BOTH);
            $leapOneUser = array_values($leapOneUser)[0] ?? null;
        } else {
            $leapOneUser = $usersForUsername->getHydramember()[0] ?? null;
        }

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
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
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
        $passwordRequest->setUserType($user->getUserType());

        try {
            $authResponse = $this->userApi->postPasswordRequest($passwordRequest);
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);

            $error = $e->getMessage();
            if(null !== $decodedError) {
                $error = $decodedError['hydra:description'];
            }

            throw new NotFoundHttpException($error);
        }

        return $this->autoMapper->map($authResponse, User::class);
    }

    public function getUserByToken(string $token): ?User
    {
        try {
            $authResponse = $this->userApi->loginByTokenUserItem($token);
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }

        return $this->autoMapper->map($authResponse, User::class);
    }

    public function requestMFACode(User $user, bool $isSMS = false): ?MFACode
    {
        $body  = new UserJsonldMfaSms();
        $body->setSms($isSMS);

        try {
            $response = $this->userApi->requestMfaCodeUserItem($user->getUuid(), $body);
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }

        return $this->autoMapper->map($response, MFACode::class);
    }

    public function validateMFACode(User $user, string $mfaCode): ?User
    {
        $body = new UserJsonldMfaCheck();
        $body->setMfaCode($mfaCode);

        try {
            $response = $this->userApi->validateMfaCodeUserItem($user->getUuid(), $body);
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }

        return $this->autoMapper->map($response, User::class);
    }

    public function getPlatformAuthUrl(string $platform): string
    {
        try {
            $socialAuthUrl = $this->socialAuthenticationApi->socialLoginGetAuthUrl($platform);
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }
        return $socialAuthUrl->getLoginUrl();
    }

    public function getUserSocial(string $platform, string $state, string $code): ?User
    {
        try {
            $response = $this->socialAuthenticationApi->socialLoginGetUser($platform, $state, $code);
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }

        return $this->autoMapper->map($response, User::class);
    }

    public function getPaginatedUsers(UserFilter $userFilter, string $targetClass = User::class): Paginator
    {
        try {
            $userCollection = $this->userApi->getUserCollection(
                $userFilter->getUsername(),
                $userFilter->getEmail(),
                $userFilter->getFirstName(),
                $userFilter->getLastName(),
                null,
                $userFilter->getUserType(),
                $userFilter->isActive(),
                $userFilter->isDeleted(),
                $userFilter->getPage(),
                $userFilter->getItemsPerPage()
            );
        } catch (ApiException $e) {
            $decodedError = json_decode($e->getResponseBody(), true);
            throw new NotFoundHttpException($decodedError['hydra:description']);
        }

        $mappedUsers = $this->autoMapper->mapMultiple($userCollection->getHydramember(), $targetClass);

        return new Paginator($mappedUsers, $userCollection->getHydratotalItems());
    }
}
