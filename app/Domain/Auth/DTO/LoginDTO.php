<?php

namespace App\Domain\Auth\DTO;

use App\System\DTO\DTO;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;

class LoginDTO extends DTO
{
    #[Email]
    public string $email;

    #[Min(8)]
    #[Max(256)]
    public string $password;
}
