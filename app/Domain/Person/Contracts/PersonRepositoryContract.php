<?php

namespace App\Domain\Person\Contracts;

use App\Domain\Person\DTO\CreatePersonDTO;
use App\Domain\Person\DTO\PersonDTO;
use App\Domain\Person\DTO\PutPersonDTO;
use App\Domain\Person\DTO\UpdatePersonDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

interface PersonRepositoryContract
{
    public function create(CreatePersonDTO $data): PersonDTO;
    public function update(int $id, string $userId,  PutPersonDTO $data): ?PersonDTO;

    public function find(int $id, ?string $userId = null): ?PersonDTO;
    public function delete(int $id, ?string $userId = null): bool;
    /**
     * @return SupportCollection<int, PersonDTO>
     */
    public function personsOfUser(string $userId): SupportCollection;
}
