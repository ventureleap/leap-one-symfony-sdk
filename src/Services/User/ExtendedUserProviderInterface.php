<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface ExtendedUserProviderInterface extends UserProviderInterface
{
    public function getUserType(): string;

    public function getUser(string $uuid): ?UserInterface;
}
