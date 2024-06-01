<?php

namespace App\Domain\Person\Controllers;

use App\Domain\Auth\Helpers\CurrentUser;
use App\Domain\Person\Contracts\PersonServiceContract;
use App\Domain\Person\DTO\CreatePersonDTO;
use App\Domain\Person\DTO\NewPersonDTO;
use App\Domain\Person\DTO\PersonDTO;
use App\Domain\Person\DTO\PutPersonDTO;
use App\System\Http\Controllers\Controller;
use Illuminate\Support\Collection as SupportCollection;

class PersonController extends Controller
{
    public function __construct(
        private PersonServiceContract $personService,
        private CurrentUser $currentUser
    ) {
    }
    public function store(NewPersonDTO $data): PersonDTO
    {
        return $this->personService->create(CreatePersonDTO::from([
            ...$data->toArray(),
            "user_id" => $this->currentUser->user()->id,
        ]));
    }
    public function show(int $personId): PersonDTO
    {
        return $this->personService->find($personId, $this->currentUser->user()->id);
    }
    public function delete(int $personId): bool
    {
        return $this->personService->delete($personId, $this->currentUser->user()->id);
    }
    public function update(int $personId, PutPersonDTO $data): PersonDTO
    {
        return $this->personService->update($personId, $this->currentUser->user()->id,  $data);
    }

    /**
     * @return SupportCollection<int, PersonDTO>
     */
    public function index(): SupportCollection
    {
        return $this->personService->personsOfUser($this->currentUser->user()->id);
    }
}
