<?php


namespace VentureLeap\LeapOnePhpSdk\Model\User;


class UserTypes
{
    const USER_TYPE_ADMIN = 'admin';
    const USER_TYPE_CUSTOMER = 'customer';

    public static function getDefaultUserType(): string
    {
        return static::USER_TYPE_ADMIN;
    }
}