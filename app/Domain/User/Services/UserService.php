<?php

namespace App\Domain\User\Services;

use App\Domain\User\Contract\UserRepositoryContract;
use App\Domain\User\Contract\UserServiceContract;
use App\Domain\User\DTO\AddUserDTO;
use App\Domain\User\DTO\UserDTO;
use App\Domain\User\Enum\RoleEnum;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserService implements UserServiceContract
{
    public function __construct(
        private UserRepositoryContract $userRepo,
    ) {
    }

    public function addUser(AddUserDTO $user): UserDTO
    {

        $exists = $this->userRepo->getUserByEmail($user->email);
        if ($exists) throw new HttpException(409, 'Usuário já existe');

        $dto = UserDTO::from($user);
        $dto->id = \Illuminate\Support\Str::uuid();
        $dto->role = RoleEnum::NORMAL;
        $dto->active = true;
        $dto->password = Hash::make($dto->password);

        return $this->userRepo->addUser($dto);
    }

    public function getUserById(string $id): UserDTO
    {
        $user = $this->userRepo->getUserById($id);
        if (!$user) throw new HttpException(404, 'Usuário não encontrado');
        return $user;
    }

    public function getUserByEmail(string $email): UserDTO
    {
        $user = $this->userRepo->getUserByEmail($email);
        if (!$user) throw new HttpException(404, 'Usuário não encontrado');
        return $user;
    }

    public function compareUserPassword(string $hashed_password, string $plain_password): bool
    {
        return Hash::check($plain_password, $hashed_password);
    }
}
