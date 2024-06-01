<?php

namespace App\Domain\Person\DTO;

use App\System\DTO\DTO;
use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;

class PersonDTO extends DTO
{
    public int $id;
    public ?string $name;
    public ?string $email;
    public ?string $cpf;
    public string $user_id;

    #[WithCast(DateTimeInterfaceCast::class)]
    public DateTime $created_at;
    #[WithCast(DateTimeInterfaceCast::class)]
    public DateTime $updated_at;
}
