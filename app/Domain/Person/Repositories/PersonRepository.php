<?php

namespace App\Domain\Person\Repositories;

use App\Domain\Person\Contracts\PersonRepositoryContract;
use App\Domain\Person\DTO\CreatePersonDTO;
use App\Domain\Person\DTO\PersonDTO;
use App\Domain\Person\DTO\PutPersonDTO;
use App\Domain\Person\DTO\UpdatePersonDTO;
use App\Domain\Person\Models\Person;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Boolean;

class PersonRepository implements PersonRepositoryContract
{
    public function create(CreatePersonDTO $data): PersonDTO
    {
        return PersonDTO::from(Person::create($data->toArray()));
    }

    public function update(int $id, PutPersonDTO $data): ?PersonDTO
    {
        $result = Person::find($id);
        if (is_null($result)) {
            return $result;
        }
        $result->fill($data->toArray());
        $result->save();
        return PersonDTO::from($result);
    }

    public function find(int $id, ?string $userId = null): ?PersonDTO
    {
        $result = Person::query()->where('id', $id);
        if (!is_null($userId)) {
            $result->where('user_id', $userId);
        }
        //@phpstan-ignore-next-line
        $result = $result->get()->first();
        return $result ? PersonDTO::from($result) : null;
    }
    public function delete(int $id, ?string $userId = null): bool
    {
        $result = Person::query()->where('id', $id);
        if (!is_null($userId)) {
            $result->where('user_id', $userId);
        }
        return !!$result->delete();
    }
    public function personsOfUser(string $userId): Collection
    {
        return PersonDTO::collect(Person::query()->where('user_id', $userId)->get(), Collection::class);
    }
}
