<?php

namespace App\Domain\User\Enum;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case NORMAL = 'normal';
}
