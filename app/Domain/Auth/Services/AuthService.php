<?php

namespace App\Domain\Auth\Services;

use App\Domain\Auth\Contract\AuthServiceContract;
use App\Domain\Auth\Contract\JWTServiceContract;
use App\Domain\Auth\DTO\LoginDTO;
use App\Domain\Auth\DTO\RegisterDTO;
use App\Domain\Auth\DTO\ResponseTokenDTO;
use App\Domain\User\Contract\UserServiceContract;
use App\Domain\User\DTO\SafeUserDTO;
use App\Domain\User\DTO\UserDTO;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthService implements AuthServiceContract
{

    public function __construct(
        private UserServiceContract $userService,
        private JWTServiceContract $jwtService,
    ) {
    }

    public function register(RegisterDTO $data): ResponseTokenDTO
    {
        $result = $this->userService->addUser($data);
        return $this->generateResponseForUser($result);
    }

    public function login(LoginDTO $data): ResponseTokenDTO
    {
        $error = new HttpException(400, 'Usuário ou senha incorretos');
        try {
            $user = $this->userService->getUserByEmail($data->email);
            $passwords_matches = $this->userService->compareUserPassword($user->password, $data->password);
            if (!$passwords_matches) throw $error;
            return $this->generateResponseForUser($user);
        } catch (\Throwable $th) {
            throw $error;
        }
    }

    private function generateResponseForUser(UserDTO $user)
    {
        $iat = Carbon::now()->timestamp;
        $data = [
            "id" => $user->id,
        ];

        $access_token = $this->jwtService->encode($data, $iat, Carbon::now()->addDays(1)->timestamp);
        $refresh_token = $this->jwtService->encode($data, $iat, Carbon::now()->addDays(7)->timestamp);
        $user = SafeUserDTO::from($user);

        return ResponseTokenDTO::from(compact(
            "refresh_token",
            "access_token",
            "user",
        ));
    }
}
