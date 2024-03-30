<?php

namespace App\Domain\User\Contract;

use App\Domain\User\DTO\AddUserDTO;
use App\Domain\User\DTO\UserDTO;

interface UserServiceContract
{
    public function addUser(AddUserDTO $user): UserDTO;
    public function getUserById(string $id): UserDTO;
    public function getUserByEmail(string $email): UserDTO;
    public function compareUserPassword(string $hashed_password, string $plain_password): bool;
}
