<?php

namespace App\Domain\User\Providers;

use App\Domain\User\Contract\UserRepositoryContract;
use App\Domain\User\Contract\UserServiceContract;
use App\Domain\User\Repositories\UserRepository;
use App\Domain\User\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    public $bindings = [
        UserRepositoryContract::class => UserRepository::class,
        UserServiceContract::class => UserService::class,
    ];
}
