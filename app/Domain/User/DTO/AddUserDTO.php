<?php

namespace App\Domain\User\DTO;

use App\System\DTO\DTO;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;

class AddUserDTO extends DTO
{
    #[Min(3)]
    #[Max(128)]
    public string $name;


    #[Email]
    public string $email;

    #[Min(8)]
    #[Max(256)]
    public string $password;
}
