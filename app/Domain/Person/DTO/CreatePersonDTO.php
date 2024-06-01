<?php

namespace App\Domain\Person\DTO;

use App\System\DTO\DTO;

class CreatePersonDTO extends DTO
{
    public ?string $name;
    public ?string $email;
    public ?string $cpf;
    public string $user_id;
}
