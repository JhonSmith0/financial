<?php

namespace App\Domain\User\DTO;

use App\Domain\User\Enum\RoleEnum;
use App\System\DTO\DTO;

class SafeUserDTO extends DTO
{
    public string $name;
    public string $email;
    public RoleEnum $role;
}
