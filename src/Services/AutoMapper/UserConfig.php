<?php


namespace VentureLeap\LeapOnePhpSdk\Services\AutoMapper;


use AutoMapperPlus\AutoMapperPlusBundle\AutoMapperConfiguratorInterface;
use AutoMapperPlus\Configuration\AutoMapperConfigInterface;
use VentureLeap\LeapOnePhpSdk\Model\User\User;
use VentureLeap\LeapOnePhpSdk\Model\User\UserTypes;
use VentureLeap\UserService\Model\UserJsonldUserRead;
use VentureLeap\UserService\Model\UserJsonldUserWrite;

class UserConfig implements AutoMapperConfiguratorInterface
{
    public function configure(AutoMapperConfigInterface $config): void
    {
        $config->registerMapping(UserJsonldUserRead::class, User::class)
            ->forMember(
                'uuid',
                function (UserJsonldUserRead $source) {
                    return $source->getUuid();
                }
            )
            ->forMember(
                'firstName',
                function (UserJsonldUserRead $source) {
                    return $source->getFirstName();
                }
            )
            ->forMember(
                'lastName',
                function (UserJsonldUserRead $source) {
                    return $source->getLastName();
                }
            )
            ->forMember(
                'email',
                function (UserJsonldUserRead $source) {
                    return $source->getEmail();
                }
            )
            ->forMember(
                'username',
                function (UserJsonldUserRead $source) {
                    return $source->getUsername();
                }
            )
            ->forMember(
                'userType',
                function (UserJsonldUserRead $source) {
                    return $source->getUserType();
                }
            )
            ->forMember(
                'roles',
                function (UserJsonldUserRead $source) {
                    return $source->getRoles();
                }
            )
            ->forMember(
                'additionalProperties',
                function (UserJsonldUserRead $source) {
                    return json_decode($source->getAdditionalProperties(), true);
                }
            )
            ->forMember(
                'active',
                function (UserJsonldUserRead $source) {
                    return $source->getActive();
                }
            )
            ->forMember(
                'createdAt',
                function (UserJsonldUserRead $source) {
                    return $source->getCreatedAt();
                }
            );

        $config->registerMapping(\VentureLeap\UserService\Model\User::class, User::class)
            ->forMember(
                'uuid',
                function (\VentureLeap\UserService\Model\User $source) {
                    return $source->getUuid();
                }
            )
            ->forMember(
                'firstName',
                function (\VentureLeap\UserService\Model\User $source) {
                    return $source->getFirstName();
                }
            )
            ->forMember(
                'lastName',
                function (\VentureLeap\UserService\Model\User $source) {
                    return $source->getLastName();
                }
            )
            ->forMember(
                'email',
                function (\VentureLeap\UserService\Model\User $source) {
                    return $source->getEmail();
                }
            )
            ->forMember(
                'username',
                function (\VentureLeap\UserService\Model\User $source) {
                    return $source->getUsername();
                }
            )
            ->forMember(
                'userType',
                function (\VentureLeap\UserService\Model\User $source) {
                    return $source->getUserType();
                }
            )
            ->forMember(
                'roles',
                function (\VentureLeap\UserService\Model\User $source) {
                    return $source->getRoles();
                }
            )
            ->forMember(
                'additionalProperties',
                function (\VentureLeap\UserService\Model\User $source) {
                    return json_decode($source->getAdditionalProperties(), true);
                }
            )
            ->forMember(
                'active',
                function (\VentureLeap\UserService\Model\User $source) {
                    return $source->getActive();
                }
            );

        $config->registerMapping(User::class, UserJsonldUserWrite::class)
            ->forMember(
                'context',
                function (User $user) {
                    return '';
                }
            )
            ->forMember(
                'email',
                function (User $user) {
                    return $user->getEmail();
                }
            )
            ->forMember(
                'username',
                function (User $user) {
                    return $user->getUsername();
                }
            )
            ->forMember(
                'password',
                function (User $user) {
                    return $user->getPlainPassword();
                }
            )
            ->forMember(
                'encoded_password',
                function (User $user) {
                    return $user->getPassword();
                }
            )
            ->forMember(
                'first_name',
                function (User $user) {
                    return $user->getFirstName();
                }
            )
            ->forMember(
                'last_name',
                function (User $user) {
                    return $user->getLastName();
                }
            )
            ->forMember(
                'deleted',
                function (User $user) {
                    return $user->isDeleted();
                }
            )
            ->forMember(
                'active',
                function (User $user) {
                    return $user->isActive();
                }
            )
            ->forMember(
                'roles',
                function (User $user) {
                    return $user->getRoles();
                }
            )
            ->forMember(
                'user_type',
                function (User $user) {
                    return $user->getUserType();
                }
            )
            ->forMember(
                'additional_properties',
                function (User $user) {
                    return json_encode($user->getAdditionalProperties());
                }
            );
    }
}
