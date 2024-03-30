<?php

namespace App\Domain\User\Contract;

use App\Domain\User\DTO\AddUserDTO;
use App\Domain\User\DTO\UserDTO;

interface UserServiceContract
{
    public function addUser(AddUserDTO $user): UserDTO;
    public function getUserById(string $id): UserDTO;
}
