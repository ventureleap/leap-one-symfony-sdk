<?php


namespace VentureLeap\LeapOneSymfonySdk\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use VentureLeap\LeapOneSymfonySdk\Form\Type\UserLoginType;
use VentureLeap\LeapOneSymfonySdk\Form\Type\UserPasswordRequestType;
use VentureLeap\LeapOneSymfonySdk\Model\User\User;
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

            /** TODO: This is a real time bomb */
            $pathInfo = $request->getPathInfo();
            $userType = explode("/", $pathInfo)[1];

            /** @var User $user */
            $user = $form->getData();

            $user->setUserType($userType);

            try {
                $response = $userManager->requestPasswordReset($user);
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
}
