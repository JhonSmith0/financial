<?php

namespace App\Domain\User\DTO;

use App\Domain\User\Enum\RoleEnum;
use App\System\DTO\DTO;

class UserDTO extends DTO
{
    public string $id;
    public string $name;
    public string $email;
    public string $password;
    public RoleEnum $role;
    public bool $active;
}
