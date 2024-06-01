<?php

namespace App\Domain\Person\Services;

use App\Domain\Person\Contracts\PersonRepositoryContract;
use App\Domain\Person\Contracts\PersonServiceContract;
use App\Domain\Person\DTO\CreatePersonDTO;
use App\Domain\Person\DTO\PersonDTO;
use App\Domain\Person\DTO\PutPersonDTO;
use App\Domain\Person\DTO\UpdatePersonDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PersonService implements PersonServiceContract
{
    public function __construct(
        private PersonRepositoryContract $personRepository
    ) {
    }
    public function create(CreatePersonDTO $data): PersonDTO
    {
        return $this->personRepository->create($data);
    }
    public function find(int $id, ?string $userId = null): PersonDTO
    {
        $result = $this->personRepository->find($id, $userId);
        if (!$result) {
            throw new NotFoundHttpException("Pessoa não encontrada!");
        }
        return $result;
    }
    public function delete(int $id, ?string $userId): bool
    {
        $result = $this->personRepository->delete($id, $userId);
        if (!$result) {
            throw new NotFoundHttpException("Pessoa não encontrada!");
        }
        return $result;
    }
    public function update(int $id, string $userId,  PutPersonDTO $data): PersonDTO
    {
        $result = $this->personRepository->update($id, $userId, $data);
        if (!$result) {
            throw new NotFoundHttpException("Pessoa não encontrada!");
        }
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function personsOfUser(string $userId): SupportCollection
    {
        return $this->personRepository->personsOfUser($userId);
    }
}
