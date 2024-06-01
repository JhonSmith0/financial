<?php

namespace App\Domain\Auth\Controllers;

use App\Domain\Auth\Contract\AuthServiceContract;
use App\Domain\Auth\DTO\LoginDTO;
use App\Domain\Auth\DTO\RegisterDTO;
use App\Domain\Auth\DTO\ResponseTokenDTO;
use App\Domain\User\DTO\SafeUserDTO;
use App\System\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function __construct(
        private AuthServiceContract $authService
    ) {
    }

    public function login(LoginDTO $data): ResponseTokenDTO
    {
        return $this->authService->login($data);
    }

    public function register(RegisterDTO $data): ResponseTokenDTO
    {
        return $this->authService->register($data);
    }

    public function getMe(): SafeUserDTO
    {
        return SafeUserDTO::from(get_user());
    }
}
