<?php


namespace VentureLeap\LeapOneSymfonySdk\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use VentureLeap\LeapOneSymfonySdk\Form\Type\MfaCheckType;
use VentureLeap\LeapOneSymfonySdk\Form\Type\UserLoginType;
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

    public function profile()
    {
        return $this->render(
            '@LeapOneSymfonySdk/User/profile.html.twig'
        );
    }
}
