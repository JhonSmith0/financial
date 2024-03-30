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

    public function validateUserToken(?string $token): UserDTO
    {
        $erro = new HttpException(401, 'Token inválido');
        if (!$token) throw $erro;
        try {
            $data = $this->jwtService->decode($token);
            $id = $data['id'] ?? null;
            $type = $data['type'] ?? null;

            if (!$id || $type !== 'access_token') throw $erro;

            $user = $this->userService->getUserById($id);
            return $user;
        } catch (\Throwable $th) {
            throw $erro;
        }
    }


    private function generateResponseForUser(UserDTO $user)
    {
        $iat = Carbon::now()->timestamp;
        $access_token_payload = [
            "id" => $user->id,
            "type" => "access_token",
        ];
        $refresh_token_payload = [
            "id" => $user->id,
            "type" => "refresh_token",
        ];

        $access_token = $this->jwtService->encode($access_token_payload, Carbon::now()->addDays(1)->timestamp, $iat);
        $refresh_token = $this->jwtService->encode($refresh_token_payload, Carbon::now()->addDays(7)->timestamp, $iat);
        $user = SafeUserDTO::from($user);

        return ResponseTokenDTO::from(compact(
            "refresh_token",
            "access_token",
            "user",
        ));
    }
}
