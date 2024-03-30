<?php

namespace App\Domain\Auth\Contract;

use App\Domain\Auth\DTO\LoginDTO;
use App\Domain\Auth\DTO\RegisterDTO;
use App\Domain\Auth\DTO\ResponseTokenDTO;
use App\Domain\User\DTO\UserDTO;

interface AuthServiceContract
{
    public function register(RegisterDTO $data): ResponseTokenDTO;
    public function login(LoginDTO $data): ResponseTokenDTO;
    public function validateUserToken(?string $token): UserDTO;
}
