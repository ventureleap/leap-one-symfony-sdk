<?php


namespace VentureLeap\LeapOneSymfonySdk\Exception;


use Symfony\Component\Security\Core\Exception\AuthenticationException;
use VentureLeap\LeapOneSymfonySdk\Model\User\User;

class MfaAuthenticationException extends AuthenticationException
{
    private $user;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

}
