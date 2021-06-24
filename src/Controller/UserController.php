<?php


namespace VentureLeap\LeapOneSymfonySdk\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security\FirewallMap;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use VentureLeap\LeapOneSymfonySdk\Form\Type\MfaCheckType;
use VentureLeap\LeapOneSymfonySdk\Form\Type\UserLoginType;
use VentureLeap\LeapOneSymfonySdk\Form\Type\PasswordResetType;
use VentureLeap\LeapOneSymfonySdk\Form\Type\UserPasswordRequestType;
use VentureLeap\LeapOneSymfonySdk\Model\User\User;
use VentureLeap\LeapOneSymfonySdk\Services\Security\LoginFormAuthenticator;
use VentureLeap\LeapOneSymfonySdk\Services\User\UserManager;

class UserController extends AbstractController
{

    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $form = $this->createForm(UserLoginType::class);
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            '@LeapOneSymfonySdk/User/login.html.twig',
            [
                'last_username' => $lastUsername,
                'form' => $form->createView(),
                'error' => $error,
            ]
        );
    }

    public function mfaCheck(
        SessionInterface $session,
        AuthenticationUtils $authenticationUtils
    ): Response
    {
        /** @var User $mfaUser */
        $mfaUser = $session->get(LoginFormAuthenticator::MFA_USER_SESSION_KEY);
        if (!$mfaUser || !$mfaUser->emailAuthEnabled()) {
            return $this->redirectToRoute('leap_one_user_login');
        }

        $form = $this->createForm(MfaCheckType::class);
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render(
            '@LeapOneSymfonySdk/User/mfaCheck.html.twig',
            [
                'form' => $form->createView(),
                'error' => $error,
            ]
        );
    }


    public function logout(): void
    {
        throw new \LogicException(
            'This method can be blank - it will be intercepted by the logout key on your firewall.'
        );
    }


    public function resetPasswordAction(Request $request, UserManager $userManager): Response
    {
        $form = $this->createForm(UserPasswordRequestType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var User $user */
            $user = $form->getData();

            $routeParameters = $request->attributes->get('_route_params');
            $userType = $routeParameters['user_type'] ?? User::DEFAULT_TYPE;
            $user->setUserType($userType);

            try {
                $userManager->requestPasswordReset($user);
                return $this->render('@LeapOneSymfonySdk/User/passwordRequestSuccess.html.twig');
            } catch (NotFoundHttpException $exception) {
                $form->addError(new FormError($exception->getMessage()));
            }
        }

        return $this->render(
            '@LeapOneSymfonySdk/User/passwordRequest.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    public function passwordResetByToken(
        Request $request,
        string $token,
        UserManager $userManager,
        SessionInterface $session
    ): Response
    {
        if (strlen($token) < 10) {
            throw new NotFoundHttpException();
        }

        $user = $userManager->getUserByToken($token);

        if (null === $user) {
            throw new NotFoundHttpException();
        }

        $sessKey = time() . str_shuffle($user->getUuid());

        $session->set($sessKey, $user);

        return $this->redirectToRoute('leap_one_user_update_password', ['sessKey' => $sessKey]);
    }

    public function updatePassword(
        Request $request,
        string $sessKey,
        UserManager $userManager,
        LoginFormAuthenticator $authenticator,
        GuardAuthenticatorHandler $guardHandler,
        SessionInterface $session,
        FirewallMap $firewallMap)
    {
        $user = $session->get($sessKey);

        if (null === $user) {
            throw new NotFoundHttpException();
        }

        $passwordEditForm = $this->createForm(PasswordResetType::class, $user);
        $passwordEditForm->handleRequest($request);

        if ($passwordEditForm->isSubmitted() && $passwordEditForm->isValid()) {
            $userManager->updateUser($user);

            $this->addFlash('success', 'flash.passwordSaved');

            $firewallConfig = $firewallMap->getFirewallConfig($request);

            $session->remove($sessKey);

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                $firewallConfig->getName()
            );
        }

        return $this->render('@LeapOneSymfonySdk/User/passwordReset.html.twig', [
            'form' => $passwordEditForm->createView(),
        ]);
    }

    public function profile()
    {
        return $this->render(
            '@LeapOneSymfonySdk/User/profile.html.twig'
        );
    }
}
