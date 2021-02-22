<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\Security;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Guard\PasswordAuthenticatedInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;
use Symfony\Component\Security\Guard\Token\PreAuthenticationGuardToken;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use VentureLeap\LeapOneSymfonySdk\Exception\MfaAuthenticationException;
use VentureLeap\LeapOneSymfonySdk\Model\User\User;
use VentureLeap\LeapOneSymfonySdk\Services\User\ExtendedUserProviderInterface;
use VentureLeap\LeapOneSymfonySdk\Services\User\UserManagerInterface;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator implements PasswordAuthenticatedInterface
{
    use TargetPathTrait;

    CONST MFA_USER_SESSION_KEY = 'MfaUser';

    private $urlGenerator;
    private $csrfTokenManager;
    /**
     * @var UserProvider
     */
    private $userProvider;
    /**
     * @var UserManager
     */
    private $userManager;
    /**
     * @var string
     */
    private $routeAfterLogin;
    /**
     * @var string
     */
    private $loginRoute;


    public function __construct(
        ExtendedUserProviderInterface $userProvider,
        UserManagerInterface $userManager,
        UrlGeneratorInterface $urlGenerator,
        CsrfTokenManagerInterface $csrfTokenManager,
        string $loginRoute,
        string $routeAfterLogin
    ) {
        $this->userProvider = $userProvider;
        $this->userManager = $userManager;
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->routeAfterLogin = $routeAfterLogin;
        $this->loginRoute = $loginRoute;
    }

    public function supports(
        Request $request
    ): bool {

        return strpos($this->loginRoute, $request->attributes->get('_route')) !== false
            && $request->isMethod('POST');
    }

    public function getCredentials(
        Request $request
    ): array {
        $credentials = $request->request->get('user_login');
        $credentials['userType'] = $this->userProvider->getUserType();
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['username']
        );

        return $credentials;
    }

    public function getUser(
        $credentials,
        UserProviderInterface $userProvider
    ): User {
        $token = new CsrfToken('authenticate', $credentials['csrf_token']);

        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }


        $user = $this->userProvider->loadUserByUsername($credentials['username']);

        if (null === $user) {
            throw new CustomUserMessageAuthenticationException('Email or Username could not be found.');
        }

        return $user;
    }

    public function checkCredentials(
        $credentials,
        UserInterface $user
    ): bool {
        $user = $this->userManager->authenticate($credentials);

        if ($user && $user->emailAuthEnabled()) {
            $this->userManager->requestMFACode($user);

            $mfaException = new MfaAuthenticationException();
            $mfaException->setUser($user);
            throw $mfaException;
        }

        return $user !== null;
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function getPassword(
        $credentials
    ): ?string {
        return $credentials['password'];
    }

    public function onAuthenticationSuccess(
        Request $request,
        TokenInterface $token,
        $providerKey
    ) {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->urlGenerator->generate($this->routeAfterLogin));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        if ($exception instanceof MfaAuthenticationException) {
            $user = $exception->getUser();
            $request->getSession()->set(self::MFA_USER_SESSION_KEY, $user);

            $mfaUrl = $this->urlGenerator->generate('leapone_user_mfa_check');
            return new RedirectResponse($mfaUrl);
        } else {
            parent::onAuthenticationFailure($request, $exception);
        }
    }

    protected function getLoginUrl(): string
    {
        return $this->urlGenerator->generate($this->loginRoute);
    }
}
