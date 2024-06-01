<?php

namespace App\Domain\Auth\Helpers;

use App\Domain\User\DTO\UserDTO;

class CurrentUser
{
    public function user(): UserDTO
    {
        // @phpstan-ignore-next-line
        return get_user();
    }
}
