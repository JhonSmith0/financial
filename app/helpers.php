<?php

use App\Domain\User\DTO\UserDTO;
use Illuminate\Support\Str;

class UserSingleton
{
    private static ?UserDTO $user;

    public static function setUser(UserDTO $user): UserDTO
    {
        self::$user = $user;
        return self::$user;
    }

    public static function getUser(): ?UserDTO
    {
        return self::$user;
    }
}

if (!function_exists('uuid')) {
    function uuid(): string
    {
        return Str::uuid();
    }
}

if (!function_exists('set_user')) {
    function set_user(UserDTO $user): UserDTO
    {
        return UserSingleton::setUser($user);
    }
}

if (!function_exists('get_user')) {
    function get_user(): ?UserDTO
    {
        return UserSingleton::getUser();
    }
}
