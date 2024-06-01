<?php

namespace App\Domain\Person\Contracts;

use App\Domain\Person\DTO\CreatePersonDTO;
use App\Domain\Person\DTO\PersonDTO;
use App\Domain\Person\DTO\PutPersonDTO;
use App\Domain\Person\DTO\UpdatePersonDTO;
use Illuminate\Support\Collection as SupportCollection;

interface PersonServiceContract
{
    public function create(CreatePersonDTO $data): PersonDTO;
    public function find(int $id, ?string $userId): PersonDTO;
    public function delete(int $id, ?string $userId): bool;
    public function update(int $id, string $userId,  PutPersonDTO $data): PersonDTO;

    /**
     * @return SupportCollection<int, PersonDTO>
     */
    public function personsOfUser(string $userId): SupportCollection;
}
