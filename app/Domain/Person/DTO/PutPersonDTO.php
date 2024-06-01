<?php

namespace App\Domain\Person\DTO;

use App\System\DTO\DTO;

class PutPersonDTO extends DTO
{
    public ?string $name;
    public ?string $email;
    public ?string $cpf;
}
