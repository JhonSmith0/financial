<?php

namespace App\Domain\User\Contract;

use App\Domain\User\DTO\UserDTO;

interface UserRepositoryContract
{
    public function addUser(UserDTO $user): UserDTO;
    public function getUserById(string $user_id): ?UserDTO;
    public function getUserByEmail(string $user_email): ?UserDTO;
}
