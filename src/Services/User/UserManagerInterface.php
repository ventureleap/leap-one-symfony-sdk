<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\User;


use Symfony\Component\Security\Core\User\UserInterface;
use VentureLeap\LeapOneSymfonySdk\Model\User\User;

interface UserManagerInterface
{
    public function registerUser(User $customer): User;

    public function getUserByUuid(string $uuid): User;

    public function updateUser(User $customer): User;

    public function getUserByUsername(string $username): ?User;

    public function isPasswordValid(UserInterface $user, $password): bool;

    public function requestPasswordReset(User $user): ?User;

    public function getUserByToken(string $token): ?User;
}
