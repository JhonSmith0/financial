<?php

namespace App\Domain\Person\DTO;

use App\System\DTO\DTO;

class NewPersonDTO extends DTO
{
    public ?string $name;
    public ?string $email;
    public ?string $cpf;
}
