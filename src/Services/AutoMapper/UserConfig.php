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
                'userType',
                function (UserJsonldUserRead $source) {
                    return $source->getUserType();
                }
            )
            ->forMember(
                'additionalProperties',
                function (UserJsonldUserRead $source) {
                    return json_decode($source->getAdditionalProperties(), true);
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
                'userType',
                function (\VentureLeap\UserService\Model\User $source) {
                    return $source->getUserType();
                }
            )
            ->forMember(
                'additionalProperties',
                function (\VentureLeap\UserService\Model\User $source) {
                    return json_decode($source->getAdditionalProperties(), true);
                }
            );

        $config->registerMapping(User::class, UserJsonldUserWrite::class)
            ->forMember(
                'container',
                function (User $source) {
                    return [
                        'context' => '',
                        'id' => null,
                        'type' => '',
                        'email' => $source->getEmail(),
                        'username' => $source->getUsername(),
                        'password' => 'default',
                        'encoded_password' => $source->getPassword(),
                        'first_name' => $source->getFirstName(),
                        'last_name' => $source->getLastName(),
                        'deleted' => $source->isDeleted(),
                        'active' => $source->isActive(),
                        'roles' => $source->getRoles(),
                        'user_type' => $source->getUserType(),
                    ];
                }
            );
    }
}