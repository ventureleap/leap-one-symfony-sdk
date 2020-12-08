<?php


namespace VentureLeap\LeapOnePhpSdk\Services\User;


use Symfony\Component\Security\Core\User\UserInterface;
use VentureLeap\LeapOnePhpSdk\Model\User\User;

interface UserManagerInterface
{
    public function registerUser(User $customer): User;

    public function getUserByUuid(string $uuid): User;

    public function updateUser(User $customer): User;

    public function getUserByUsername(string $username): ?User;

    public function isPasswordValid(UserInterface $user, $password): bool;
}