<?php

namespace App\Domain\Auth\DTO;

use App\Domain\User\DTO\SafeUserDTO;
use App\System\DTO\DTO;

class ResponseTokenDTO extends DTO
{
    public string $refresh_token;
    public string $access_token;
    public SafeUserDTO $user;
}
