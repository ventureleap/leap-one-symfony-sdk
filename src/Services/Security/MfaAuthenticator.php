<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use VentureLeap\LeapOneSymfonySdk\Model\User\User;
use VentureLeap\LeapOneSymfonySdk\Services\User\ExtendedUserProviderInterface;
use VentureLeap\LeapOneSymfonySdk\Services\User\UserManagerInterface;

class MfaAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;

    private $urlGenerator;
    private $csrfTokenManager;
    /**
     * @var UserProvider
     */
    private $userProvider;
    /**
     * @var UserManagerInterface
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
        $credentials = $request->request->get('mfa_check');

        $credentials['username'] = $request->getSession()->get(Security::LAST_USERNAME);

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
        try {
            $user = $this->userManager->validateMFACode($user, $credentials['code']);

            return $user !== null;
        } catch (NotFoundHttpException $e) {
            throw new BadCredentialsException();
        }
    }

    public function onAuthenticationSuccess(
        Request $request,
        TokenInterface $token,
        $providerKey
    ) {
        $request->getSession()->remove(LoginFormAuthenticator::MFA_USER_SESSION_KEY);

        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->urlGenerator->generate($this->routeAfterLogin));
    }


    protected function getLoginUrl(): string
    {
        return $this->urlGenerator->generate($this->loginRoute);
    }
}
