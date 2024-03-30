<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Contract\UserRepositoryContract;
use App\Domain\User\DTO\UserDTO;
use Illuminate\Database\Eloquent\Model;
use App\Domain\User\Models\User;

class UserRepository implements UserRepositoryContract
{

    public function addUser(UserDTO $user): UserDTO
    {
        $user_model = new User;

        $user_model->fill($user->toArray());
        $user_model->save();

        return $user;
    }

    public function getUserById(string $user_id): ?UserDTO
    {
        $user = User::query()->find($user_id);
        return $user ? UserDTO::from($user) : null;
    }

    public function getUserByEmail(string $user_email): ?UserDTO
    {
        $user = User::query()->where('email', $user_email)->get()->first();
        return $user ? UserDTO::from($user) : null;
    }
}
